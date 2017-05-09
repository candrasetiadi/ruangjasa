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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
