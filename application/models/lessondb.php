<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');
/**
*
*/
class LessonDB extends MY_Model {

	function Insert_lesson_category($post) {

		$this->db->set('lesson_category_name', $post['lesson_category_name']);
		$this->db->set('created_at', date('Y-m-d h:i:s'));
		$this->db->set('created_by', $this->session->userdata('user'));
		$this->db->set('updated_at', date('Y-m-d h:i:s'));
		$this->db->set('updated_by', $this->session->userdata('user'));
		$this->db->insert('lesson_category');
		
	}

	function Insert_lesson($post) {

		$this->db->set('lesson_name', $post['lesson_name']);
		$this->db->set('lesson_category_id', $post['lesson_category_id']);
		$this->db->set('created_at', date('Y-m-d h:i:s'));
		$this->db->set('created_by', $this->session->userdata('user'));
		$this->db->set('updated_at', date('Y-m-d h:i:s'));
		$this->db->set('updated_by', $this->session->userdata('user'));
		$this->db->insert('lesson');
		
	}

	function Update_lesson_category($post) {

		$this->db->where('lesson_category_id',$post['lesson_category_id']);
		$this->db->set('lesson_category_name',$post['lesson_category_name']);
		$this->db->set('updated_at', date('Y-m-d h:i:s'));
		$this->db->set('updated_by', $this->session->userdata('user'));
		$this->db->update('lesson_category');
	}

	function Update_lesson($post) {

		$this->db->where('lesson_id',$post['lesson_id']);
		$this->db->set('lesson_name',$post['lesson_name']);
		$this->db->set('lesson_category_id', $post['lesson_category_id']);
		$this->db->set('updated_at', date('Y-m-d h:i:s'));
		$this->db->set('updated_by', $this->session->userdata('user'));
		$this->db->update('lesson');
	}

	function get_category() {

		$res = $this->db->get('lesson_category');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function get_lesson() {

		$res = $this->db->get('lesson_category');
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function get_lesson_category_by_id($lesson_category_id) {

		$this->db->where('lesson_category_id',$lesson_category_id);
		$res = $this->db->get('lesson_category');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_lesson_by_id($lesson_id) {

		$this->db->where('lesson_id',$lesson_id);
		$res = $this->db->get('lesson');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_lesson_category_by_name($lesson_category_name) {

		$this->db->where('lesson_category_name',$lesson_category_name);
		$res = $this->db->get('lesson_category');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function get_lesson_by_name($lesson_name) {

		$this->db->where('lesson_name',$lesson_name);
		$res = $this->db->get('lesson');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function Delete_lesson_category($lesson_category_id) {

		$this->db->where('lesson_category_id',$lesson_category_id);
		$this->db->delete('lesson_category');

	}

	function Delete_lesson($lesson_id) {

		$this->db->where('lesson_id',$lesson_id);
		$this->db->delete('lesson');

	}
}
?>
