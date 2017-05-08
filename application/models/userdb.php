<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');
/**
*
*/
class UserDB extends MY_Model {

	function CheckLogin($post) {

		$this->db->where('user_email',$post['username']);
		$this->db->where('user_password',md5($post['password'].SALT));
		$this->db->where('user_status','active');
		$res = $this->db->get('users');
		if($res->num_rows() > 0) {
			$row = $res->row();

			$this->db->where('user_id',$row->user_id);
			$this->db->set('last_login',date('Y-m-d H:i:s'));
			$this->db->update('users');

			return $row;

		} else {
			return null;
		}
	}

	function CheckOldPassword($id,$pass) {

		$this->db->where('id',$id);
		$this->db->where('password',md5($pass.SALT));
		$this->db->where('status','Active');
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return true;
		else
			return false;
	}

	function changePassword($id,$pass) {

		$this->db->where('id',$id);
		$this->db->set('password',md5($pass.SALT));
		$this->db->update('users');
	}

	function getLoginInfo($id) {

		$this->db->where('user_id',$id);
		$this->db->where('user_status','active');
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function Insert($post) {

		$this->db->set('user_email',$post['user_email']);
		$this->db->set('user_name',$post['user_name']);
		$this->db->set('user_password',md5($post['user_password'].SALT));
		$this->db->set('user_profession',$post['user_profession']);
		$this->db->set('user_type',$post['user_type']);
		$this->db->set('user_status',$post['user_status']);
		$this->db->set('user_gender',$post['user_gender']);
		$this->db->set('user_address',$post['user_address']);
		$this->db->set('user_province_id',$post['user_province_id']);
		$this->db->set('user_city_id',$post['user_city_id']);
		$this->db->set('user_district_id',$post['user_district_id']);
		$this->db->set('user_phone',$post['user_phone']);
		$this->db->insert('users');
		
	}

	function Update($post) {

		$this->db->where('user_id',$post['user_id']);
		$this->db->set('user_email',$post['user_email']);
		$this->db->set('user_name',$post['user_name']);
		if($post['user_password'] != '')
			$this->db->set('user_password',md5($post['user_password'].SALT));
		$this->db->set('user_profession',$post['user_profession']);
		$this->db->set('user_type',$post['user_type']);
		$this->db->set('user_status',$post['user_status']);
		$this->db->set('user_gender',$post['user_gender']);
		$this->db->set('user_address',$post['user_address']);
		$this->db->set('user_province_id',$post['user_province_id']);
		$this->db->set('user_city_id',$post['user_city_id']);
		$this->db->set('user_district_id',$post['user_district_id']);
		$this->db->set('user_phone',$post['user_phone']);
		$this->db->update('users');
	}

	function get_by_id($id) {

		$this->db->where('user_id',$id);
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function getByStringId($string_id) {

		$this->db->where('string_id',$string_id);
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_email($user_email) {

		$this->db->where('user_email',$user_email);
		$res = $this->db->get('users');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function Delete($id) {

		$this->db->where('id',$id);
		$this->db->set('status','Inactive');
		$this->db->update('users');
	}

	function Activate($id) {

		$this->db->where('id',$id);
		$this->db->set('status','Active');
		$this->db->update('users');
	}

	function get_provinces() { 
		
		$res = $this->db->get('provinces');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function get_cities_by_province($user_province_id) {

		$this->db->where('province_id', $user_province_id);
		$res = $this->db->get('regencies');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function get_district_by_city($user_city_id) {

		$this->db->where('regency_id', $user_city_id);
		$res = $this->db->get('districts');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}
}
?>
