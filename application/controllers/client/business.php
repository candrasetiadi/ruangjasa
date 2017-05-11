<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Business extends MY_Controller {

	public function index() {
		$this->load->model('servicesdb');
		$this->load->model('userdb');

		$data['category'] = $this->servicesdb->get_category();
		$data['province'] = $this->userdb->get_provinces();

		$this->Render('business','business','Business', $data, 'default');
	}

	function get_city() {

		$post = $this->PopulatePost();
		$this->load->model('userdb');

		$obj = $this->userdb->get_cities_by_province($post['user_province']);

		if($obj != array()) {

			echo json_encode(array(
				'error_code'=>0,
				'message'=>'',
				'data'=>$obj)
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
	
}
