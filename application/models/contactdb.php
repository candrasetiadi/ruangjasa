<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');
/**
*
*/
class ContactDB extends MY_Model {

	function Insert($post)
	{
		$this->db->set('name',$post['name']);
		$this->db->set('email',$post['email']);
		$this->db->set('subject',$post['subject']);
		$this->db->set('message',$post['message']);
		$this->db->insert('contactus');
	}

	function Read($id)
	{
		$this->db->set('is_read',true);
		$this->db->where('id',$id);
		$this->db->update('contactus');
	}

	function getById($id)
	{
		$this->db->where('id',$id);
		$res = $this->db->get('contactus');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function Delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('contactus');
	}
}
?>
