<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendance extends MY_Controller {

	public function index() {
		$this->load->model('attendancedb');

		$data = array();
		$data['category'] = $this->attendancedb->get_category();
		$this->Render('attendance','attendance','Lesson', $data);
	}

	function process() {
		$this->load->model('attendancedb');

		$post = $this->PopulatePost();
		if($post['id'] == 'new') {
			
			if($this->attendancedb->get_lesson_by_name($post['lesson_name']) != null) {
				echo json_encode(
					array(
						'error_code'=>1,
						'error'=>'Lesson Name already exist'
					)
				);
				return;
			}
			$this->attendancedb->insert_lesson($post);

			echo json_encode(
				array(
					'error_code'=>0,
					'error'=>''
				)
			);
		} else if($post['id'] != 'new') {

			$this->attendancedb->update_lesson($post);

			echo json_encode(
				array(
					'error_code'=>0,
					'error'=>''
				)
			);
		} else {
			echo json_encode(
				array(
					'error_code'=>'403',
					'error'=>'Invalid operation.'
				)
			);
		}
	}

	function get_by_id() {
		$post = $this->PopulatePost();
		$this->load->model('attendancedb');
		$obj = $this->attendancedb->get_lesson_by_id($post['lesson_id']);
		if($obj != null) {

			$obj->error_code = 0;
			$obj->message = '';
			echo json_encode($obj); 

		} else {

			echo json_encode(
				array(
					'error_code'=>'403',
					'error'=>'Invalid operation.'
				)
			);
		}
	}

	function delete() {
		$this->load->model('attendancedb');

		$post = $this->PopulatePost(); 
		$obj = $this->attendancedb->get_lesson_by_id($post['data']);

		if($obj != null) { 

			$this->attendancedb->delete_lesson($post['data']);
			echo json_encode(
				array(
					'error_code'=>'0',
					'error'=>'Success delete.'
				)
			);

		} else {

			echo json_encode(
				array(
					'error_code'=>'403',
					'error'=>'Invalid operation.'
				)
			);
		}
	}

	function get() {
		$aColumns = array('lesson_name', 'lesson_category_name', 'updated_at', 'lesson_id');
		$sIndexColumn = "lesson_id";
		$sTable = "(SELECT a.*, b.lesson_category_name FROM lesson a LEFT JOIN lesson_category b ON a.lesson_category_id = b.lesson_category_id) src";

		$add_where = "";
		/*
		* Paging
		*/
		$data = $this->getdata($aColumns,$sIndexColumn,$sTable,$add_where);

		$output = $data['output'];
		$datares = $data['datares'];

		if(!empty($datares)) {

			foreach($datares->result_array() as $aRow) {
				$row = array();

				for ( $i=0 ; $i<count($aColumns) ; $i++ ) {

					if ( $aColumns[$i] == 'lesson_id' ) {
						$row['action_edit'] = '<a href="#" title="Edit" class="btn_edit fa fa-pencil" data="'.$aRow['lesson_id'].'"></a> ';
						$row['action_delete'] = '<a href="#" title="Delete" class="btn_delete fa fa-times" data="'.$aRow['lesson_id'].'"></a> ';

					} else if($aColumns[$i] == 'updated_at') {

						$str = '';
						if($aRow[$aColumns[$i]] != '') {
							$str = date('j M Y h:i:s',strtotime($aRow[$aColumns[$i]]));
						}

						$row[$aColumns[$i]] = $str;

					} else if ( $aColumns[$i] != ' ' ) {
						/* General output */
						$row[$aColumns[$i]] = $aRow[ $aColumns[$i] ];
					}
				}
				$output['data'][] = $row;
			}
		}

		echo json_encode( $output );
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
