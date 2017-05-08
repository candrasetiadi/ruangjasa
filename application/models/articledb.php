<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');
/**
*
*/
class ArticleDB extends MY_Model {

	function GetFeatured()
	{
		$this->db->order_by('is_featured','desc');
		$this->db->order_by('featured_date','desc');
		$this->db->order_by('createdate','desc');
		$this->db->where_in('type',array('News','Career','Event'));
		$res = $this->db->get('article',5);
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}
}
?>
