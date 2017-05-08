<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function index() {

		$this->load->model('userdb');

		$data['provinces'] = $this->userdb->get_provinces();

		$this->Render('users','users','Users', $data);
	}

	function process() {

		$post = $this->PopulatePost();
		// $param = array("name","username","password");
		// if($this->checkParameter($param))
		// {
		if($post['id'] == 'new') {

			$this->load->model('userdb');
			if($this->userdb->get_email($post['user_email']) != null) {

				echo json_encode(
					array(
						'error_code'=>1,
						'error'=>'Email already exist'
					)
				);
				return;
			}
			$this->userdb->insert($post);

			echo json_encode(
				array(
					'error_code'=>0,
					'error'=>''
				)
			);
		} else if($post['id'] != 'new') {

			$this->load->model('userdb');
			$this->userdb->update($post);

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
		$this->load->model('userdb');

		$obj = $this->userdb->get_by_id($post['user_id']);
		$obj->city = $this->userdb->get_cities_by_province($obj->user_province_id);
		$obj->district = $this->userdb->get_district_by_city($obj->user_city_id);

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

	function get_city() {

		$post = $this->PopulatePost();
		$this->load->model('userdb');

		$obj = $this->userdb->get_cities_by_province($post['user_province_id']);

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

	function get_district()
	{
		$post = $this->PopulatePost();
		$this->load->model('userdb');

		$obj = $this->userdb->get_district_by_city($post['user_city_id']);

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

	function delete() {

		$post = $this->PopulatePost();
		// $param = array("data");
		// if($this->checkParameter($param))
		// {
			$this->load->model('userdb');
			$obj = $this->userdb->get_by_id($post['data']);
			if($obj != null) {

				$this->userdb->delete($post['data']);
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

		$aColumns = array('user_email','user_name','user_address','name','user_phone','user_status','last_login','user_id');
		$sIndexColumn = "user_id";
		$sTable = "(SELECT a.*, b.name from users a LEFT JOIN regencies b ON a.user_city_id = b.id) src";

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

					if ( $aColumns[$i] == 'user_id' ) {

						$row['action_edit'] = '<a href="#" title="Edit" class="btn_edit fa fa-pencil" data="'.$aRow['user_id'].'"></a> ';
						$row['action_view'] = '<a href="#" title="View" class="btn_view fa fa-folder-open-o" data="'.$aRow['user_id'].'"></a> ';

					} else if($aColumns[$i] == 'last_login') {

						$str = '';
						if($aRow[$aColumns[$i]] != '')
							$str = date('j M Y',strtotime($aRow[$aColumns[$i]]));
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

	function get_admin(){

		$aColumns = array('user_email','user_name','user_address','name','user_phone','user_status','last_login','user_id');
		$sIndexColumn = "user_id";
		$sTable = "(SELECT a.*, b.name from users a LEFT JOIN regencies b ON a.user_city_id = b.id WHERE user_type = 'admin') src";

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

					if ( $aColumns[$i] == 'user_id' ) {

						$row['action_edit'] = '<a href="#" title="Edit" class="btn_edit fa fa-pencil" data="'.$aRow['user_id'].'"></a> ';
						$row['action_view'] = '<a href="#" title="View" class="btn_view fa fa-folder-open-o" data="'.$aRow['user_id'].'"></a> ';

					} else if($aColumns[$i] == 'last_login') {

						$str = '';
						if($aRow[$aColumns[$i]] != '')
							$str = date('j M Y',strtotime($aRow[$aColumns[$i]]));
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
