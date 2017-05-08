<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');
/**
*
*/
class LevelDB extends MY_Model {

	function Insert($post) {

		$this->db->set('class_level_category_name', $post['class_level_category_name']);
		$this->db->set('created_at', date('Y-m-d h:i:s'));
		$this->db->set('created_by', $this->session->userdata('user'));
		$this->db->set('updated_at', date('Y-m-d h:i:s'));
		$this->db->set('updated_by', $this->session->userdata('user'));
		$this->db->insert('class_level_category');
		
	}

	function Update($post) {

		$this->db->where('class_level_category_id',$post['class_level_category_id']);
		$this->db->set('class_level_category_name',$post['class_level_category_name']);
		$this->db->set('updated_at', date('Y-m-d h:i:s'));
		$this->db->set('updated_by', $this->session->userdata('user'));
		$this->db->update('class_level_category');
	}

	function Insert_level($post) {

		$this->db->set('class_level_name', $post['class_level_name']);
		$this->db->set('class_level_category_id', $post['class_level_category_id']);
		$this->db->set('created_at', date('Y-m-d h:i:s'));
		$this->db->set('created_by', $this->session->userdata('user'));
		$this->db->set('updated_at', date('Y-m-d h:i:s'));
		$this->db->set('updated_by', $this->session->userdata('user'));
		$this->db->insert('class_level');
		
	}

	function Update_level($post) {

		$this->db->where('class_level_id',$post['class_level_id']);
		$this->db->set('class_level_name', $post['class_level_name']);
		$this->db->set('class_level_category_id', $post['class_level_category_id']);
		$this->db->set('updated_at', date('Y-m-d h:i:s'));
		$this->db->set('updated_by', $this->session->userdata('user'));
		$this->db->update('class_level');
	}

	function get_category() {

		$res = $this->db->get('class_level_category');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function get_by_id($class_level_category_id) {

		$this->db->where('class_level_category_id',$class_level_category_id);
		$res = $this->db->get('class_level_category');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_level_by_id($class_level_id) {

		$this->db->where('class_level_id',$class_level_id);
		$res = $this->db->get('class_level');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_category_by_name($class_level_category_name) {

		$this->db->where('class_level_category_name',$class_level_category_name);
		$res = $this->db->get('class_level_category');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_level_by_name($class_level_name) {

		$this->db->where('class_level_name',$class_level_name);
		$res = $this->db->get('class_level');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function Delete($class_level_category_id) {

		$this->db->where('class_level_category_id',$class_level_category_id);
		$this->db->delete('class_level_category');

	}

	function Delete_level($class_level_id) {

		$this->db->where('class_level_id',$class_level_id);
		$this->db->delete('class_level');

	}
}
?>
