<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services_category extends MY_Controller {

	public function index() {

		$this->load->model('servicesdb');

		$data = array();

		$this->Render('services_category','services_category','Services Category', $data);
	}

	function process() {

		$post = $this->PopulatePost();
		$this->load->model('servicesdb');
		// $param = array("name","username","password");
		// if($this->checkParameter($param))
		// {
		if($post['id'] == 'new') {
			if($this->servicesdb->get_category_name($post['services_category_name']) != null) {

				echo json_encode(
					array(
						'error_code'=>1,
						'error'=>'Category already exist'
					)
				);
				return;
			}
			$this->servicesdb->insert_category($post);

			echo json_encode(
				array(
					'error_code'=>0,
					'error'=>''
				)
			);
		} else if($post['id'] != 'new') {
			$this->servicesdb->update_category($post);

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
		// }
	}

	function get_by_id() {

		$post = $this->PopulatePost();
		$this->load->model('servicesdb');

		$obj = $this->servicesdb->get_category_by_id($post['services_category_id']);

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

		$post = $this->PopulatePost();
		// $param = array("data");
		// if($this->checkParameter($param))
		// {
			$this->load->model('servicesdb');
			$obj = $this->servicesdb->get_category_by_id($post['data']);
			if($obj != null) {

				$this->servicesdb->delete_category($post['data']);
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
		// }
	}

	function get() {

		$aColumns = array('services_category_id','services_category_name');
		$sIndexColumn = "services_category_id";
		$sTable = "(SELECT * FROM services_category) src";

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

					if ( $aColumns[$i] == 'services_category_name' ) {
						$row[$aColumns[$i]] = $aRow[ $aColumns[$i] ];

						$row['action_edit'] = '<a href="#" title="Edit" class="btn_edit fa fa-pencil" data="'.$aRow['services_category_id'].'"></a> ';
						$row['action_delete'] = '<a href="#" title="Delete" class="btn_delete fa fa-times" data="'.$aRow['services_category_id'].'"></a> ';
	
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
