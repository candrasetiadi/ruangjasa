<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_level_category extends MY_Controller {

	public function index() {
		$this->load->model('leveldb');

		$data = array();
		$this->Render('class_level_category','class_level_category','Level Category', $data);
	}

	function process() {
		$this->load->model('leveldb');

		$post = $this->PopulatePost();
		if($post['id'] == 'new') {
			
			if($this->leveldb->get_category_by_name($post['class_level_category_name']) != null) {
				echo json_encode(
					array(
						'error_code'=>1,
						'error'=>'Category name already exist'
					)
				);
				return;
			}
			$this->leveldb->insert($post);

			echo json_encode(
				array(
					'error_code'=>0,
					'error'=>''
				)
			);
		} else if($post['id'] != 'new') {

			$this->leveldb->update($post);

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
		$this->load->model('leveldb');
		$obj = $this->leveldb->get_by_id($post['class_level_category_id']);
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
		$this->load->model('leveldb');

		$post = $this->PopulatePost(); 
		$obj = $this->leveldb->get_by_id($post['data']);

		if($obj != null) { 

			$this->leveldb->delete($post['data']);
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
		$aColumns = array('class_level_category_name', 'updated_at', 'class_level_category_id');
		$sIndexColumn = "class_level_category_id";
		$sTable = "(SELECT * FROM class_level_category) src";

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

					if ( $aColumns[$i] == 'class_level_category_id' ) {
						$row['action_edit'] = '<a href="#" title="Edit" class="btn_edit fa fa-pencil" data="'.$aRow['class_level_category_id'].'"></a> ';
						$row['action_delete'] = '<a href="#" title="Delete" class="btn_delete fa fa-times" data="'.$aRow['class_level_category_id'].'"></a> ';

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
