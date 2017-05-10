<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');
/**
*
*/
class ServicesDB extends MY_Model {

	function insert($post) {

		$this->db->set('services_name',$post['services_name']);
		$this->db->set('services_category_id',$post['services_category_id']);
		$this->db->insert('services');
		
	}

	function update($post) {

		$this->db->where('services_id',$post['services_id']);
		$this->db->set('services_name',$post['services_name']);
		$this->db->set('services_category_id',$post['services_category_id']);
		$this->db->update('services');
	}

	function get_services() {

		$res = $this->db->get('services');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function get_by_id($services_id) {

		$this->db->where('services_id',$services_id);
		$res = $this->db->get('services');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_services_name($services_name) {

		$this->db->where('services_name',$services_name);
		$res = $this->db->get('services');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function delete($services_id) {

		$this->db->where('services_id',$services_id);
		$this->db->update('services');
	}

	function insert_category($post) {

		$this->db->set('services_category_name',$post['services_category_name']);
		$this->db->insert('services_category');
		
	}

	function update_category($post) {

		$this->db->where('services_category_id',$post['services_category_id']);
		$this->db->set('services_category_name',$post['services_category_name']);
		$this->db->update('services_category');
	}

	function get_category() {

		$res = $this->db->get('services_category');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function get_category_by_id($services_category_id) {

		$this->db->where('services_category_id',$services_category_id);
		$res = $this->db->get('services_category');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_category_name($services_category_name) {

		$this->db->where('services_category_name',$services_category_name);
		$res = $this->db->get('services_category');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function delete_category($services_category_id) {

		$this->db->where('services_category_id',$services_category_id);
		$this->db->update('services_category');
	}


	/*================*/

	function insert_request_form($post) {

		$this->db->set('services_id',$post['services_id']);
		$this->db->set('services_request_form_name',$post['services_request_form_name']);
		$this->db->set('services_request_form_datatype',$post['services_request_form_datatype']);
		$this->db->insert('services_request_form');
		
	}

	function update_request_form($post) {

		$this->db->where('services_request_form_id',$post['services_request_form_id']);
		$this->db->set('services_id',$post['services_id']);
		$this->db->set('services_request_form_name',$post['services_request_form_name']);
		$this->db->set('services_request_form_datatype',$post['services_request_form_datatype']);
		$this->db->update('services_request_form');
	}

	function delete_request_form($services_request_form_id) {

		$this->db->where('services_request_form_id',$services_request_form_id);
		$this->db->update('services_request_form');
	}

	function get_request_form() {

		$res = $this->db->get('services_request_form');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function get_request_form_by_services_id($services_id) {

		$this->db->where('services_id',$services_id);
		$res = $this->db->get('services_request_form');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_request_form_by_id($services_request_form_id) {

		$this->db->where('services_request_form_id',$services_request_form_id);
		$res = $this->db->get('services_request_form');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}
}
?>
