<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends MY_Controller {

	public function index() {

		$this->load->model('servicesdb');

		$data = array();
		$data['categories'] = $this->servicesdb->get_category();

		$this->Render('services','services','Services Category', $data);
	}

	function process() {

		$post = $this->PopulatePost();
		// $param = array("name","username","password");
		// if($this->checkParameter($param))
		// {
		if($post['id'] == 'new') {

			$this->load->model('servicesdb');
			if($this->servicesdb->get_services_name($post['services_name']) != null) {

				echo json_encode(
					array(
						'error_code'=>1,
						'error'=>'Services already exist'
					)
				);
				return;
			}
			$this->servicesdb->insert($post);

			echo json_encode(
				array(
					'error_code'=>0,
					'error'=>''
				)
			);
		} else if($post['id'] != 'new') {

			$this->load->model('servicesdb');
			$this->servicesdb->update($post);

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

		$obj = $this->servicesdb->get_by_id($post['services_id']);

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
			$obj = $this->servicesdb->get_by_id($post['data']);
			if($obj != null) {

				$this->servicesdb->delete($post['data']);
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

		$aColumns = array('services_name', 'services_category_name','services_id');
		$sIndexColumn = "services_id";
		$sTable = "(SELECT a.*, b.services_category_name FROM services a LEFT JOIN services_category b ON a.services_category_id = b.services_category_id) src";

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

					if ( $aColumns[$i] == 'services_id' ) {

						$row['action_edit'] = '<a href="#" title="Edit" class="btn_edit fa fa-pencil" data="'.$aRow['services_id'].'"></a> ';
						$row['action_delete'] = '<a href="#" title="Delete" class="btn_delete fa fa-times" data="'.$aRow['services_id'].'"></a> ';
	
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


	/*=======================REQUEST=FORM==================================*/

	public function request_form() {

		$this->load->model('servicesdb');

		$data = array();
		$data['services'] = $this->servicesdb->get_services();

		$this->Render('request_form','request_form','Request Form', $data);
	}

	function process_request_form() {

		$post = $this->PopulatePost();
		// $param = array("name","username","password");
		// if($this->checkParameter($param))
		// {
		if($post['id'] == 'new') {

			$this->load->model('servicesdb');
			
			$this->servicesdb->insert_request_form($post);

			echo json_encode(
				array(
					'error_code'=>0,
					'error'=>''
				)
			);
		} else if($post['id'] != 'new') {

			$this->load->model('servicesdb');
			$this->servicesdb->update_request_form($post);

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

	function get_request_form_by_id() {

		$post = $this->PopulatePost();
		$this->load->model('servicesdb');

		$obj = $this->servicesdb->get_request_form_by_id($post['services_id']);

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

	function delete_request_form() {

		$post = $this->PopulatePost();
		// $param = array("data");
		// if($this->checkParameter($param))
		// {
			$this->load->model('servicesdb');
			$obj = $this->servicesdb->get_request_form_by_id($post['data']);
			if($obj != null) {

				$this->servicesdb->delete_request_form($post['data']);
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

	function get_request_form() {

		$aColumns = array('services_name', 'services_request_form_name', 'services_request_form_datatype', 'services_request_form_id');
		$sIndexColumn = "services_request_form_id";
		$sTable = "(SELECT a.*, b.services_name FROM services_request_form a LEFT JOIN services b ON a.services_id = b.services_id) src";

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

					if ( $aColumns[$i] == 'services_request_form_id' ) {

						$row['action_edit'] = '<a href="#" title="Edit" class="btn_edit fa fa-pencil" data="'.$aRow['services_request_form_id'].'"></a> ';
						$row['action_delete'] = '<a href="#" title="Delete" class="btn_delete fa fa-times" data="'.$aRow['services_request_form_id'].'"></a> ';
	
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

	/*=======================REQUEST=FORM=OPTIONS===========================*/

	public function request_form_options() {

		$this->load->model('servicesdb');

		$data = array();
		$data['form'] = $this->servicesdb->get_request_form();

		$this->Render('request_form_options','request_form_options','Request Form Options', $data);
	}

	function process_request_form_options() {

		$post = $this->PopulatePost();
		// $param = array("name","username","password");
		// if($this->checkParameter($param))
		// {
		if($post['id'] == 'new') {

			$this->load->model('servicesdb');
			
			$this->servicesdb->insert_request_form_options($post);

			echo json_encode(
				array(
					'error_code'=>0,
					'error'=>''
				)
			);
		} else if($post['id'] != 'new') {

			$this->load->model('servicesdb');
			$this->servicesdb->update_request_form_options($post);

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

	function get_request_form_options_by_id() {

		$post = $this->PopulatePost();
		$this->load->model('servicesdb');

		$obj = $this->servicesdb->get_request_form_options_by_id($post['services_form_options_id']);

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

	function delete_request_form_options() {

		$post = $this->PopulatePost();
		// $param = array("data");
		// if($this->checkParameter($param))
		// {
			$this->load->model('servicesdb');
			$obj = $this->servicesdb->get_request_form_options_by_id($post['data']);
			if($obj != null) {

				$this->servicesdb->delete_request_form_options($post['data']);
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

	function get_request_form_options() {

		$aColumns = array('services_request_form_name', 'services_form_options_name', 'services_form_options_id');
		$sIndexColumn = "services_form_options_id";
		$sTable = "(SELECT a.*, b.services_request_form_name FROM services_form_options a LEFT JOIN services_request_form b ON a.services_request_form_id = b.services_request_form_id) src";

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

					if ( $aColumns[$i] == 'services_form_options_id' ) {

						$row['action_edit'] = '<a href="#" title="Edit" class="btn_edit fa fa-pencil" data="'.$aRow['services_form_options_id'].'"></a> ';
						$row['action_delete'] = '<a href="#" title="Delete" class="btn_delete fa fa-times" data="'.$aRow['services_form_options_id'].'"></a> ';
	
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
