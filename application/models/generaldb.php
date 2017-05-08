<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');
/**
*
*/
class GeneralDB extends CI_Model {

		function Get()
		{
			$res = $this->db->get('general');
			if($res->num_rows() > 0)
				return $res->row();
			else
				return null;
		}
		
		function Update($field,$value)
		{
			$this->db->set($field,$value);
			$this->db->update('general');
		}
}
?>
