<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesson_category extends MY_Controller {

	public function index() {
		$this->load->model('lessondb');

		$data = array();
		$this->Render('lesson_category','lesson_category','Lesson Category', $data);
	}

	function process() {
		$this->load->model('lessondb');

		$post = $this->PopulatePost();
		if($post['id'] == 'new') {
			
			if($this->lessondb->get_lesson_category_by_name($post['lesson_category_name']) != null) {
				echo json_encode(
					array(
						'error_code'=>1,
						'error'=>'Lesson Category Name already exist'
					)
				);
				return;
			}
			$this->lessondb->insert_lesson_category($post);

			echo json_encode(
				array(
					'error_code'=>0,
					'error'=>''
				)
			);
		} else if($post['id'] != 'new') {

			$this->lessondb->update_lesson_category($post);

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
		$this->load->model('lessondb');
		$obj = $this->lessondb->get_lesson_category_by_id($post['lesson_category_id']);
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
		$this->load->model('lessondb');

		$post = $this->PopulatePost(); 
		$obj = $this->lessondb->get_lesson_category_by_id($post['data']);

		if($obj != null) { 

			$this->lessondb->delete_lesson_category($post['data']);
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
		$aColumns = array('lesson_category_name', 'updated_at', 'lesson_category_id');
		$sIndexColumn = "lesson_category_id";
		$sTable = "(SELECT * FROM lesson_category) src";

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

					if ( $aColumns[$i] == 'lesson_category_id' ) {
						$row['action_edit'] = '<a href="#" title="Edit" class="btn_edit fa fa-pencil" data="'.$aRow['lesson_category_id'].'"></a> ';
						$row['action_delete'] = '<a href="#" title="Delete" class="btn_delete fa fa-times" data="'.$aRow['lesson_category_id'].'"></a> ';

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
