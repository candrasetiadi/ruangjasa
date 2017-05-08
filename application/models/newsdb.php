<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');
/**
*
*/
class NewsDB extends MY_Model {

	function Get($page,$items)
	{
		$this->db->order_by('createdate','desc');
		$res = $this->db->get('news',$items,($page-1)*$items);
		if($res->num_rows() > 0)
			return $res->result();
		else
			return array();
	}

	function GetCount()
	{
		$res = $this->db->get('news');
		return $res->num_rows();
	}

	function process($post, $filename/*, $uid*/)
	{
		$this->db->where('title',$post['title']);
		if($post['id'] !=  'new')
		{
			$this->db->where('id != ',$post['id']);
		}
		$res = $this->db->get('news');
		if($res->num_rows() == 0)
		{
			$string_id = $this->createStringId($post['title'],$post['id'],'news');
			$this->db->set('string_id',$string_id);
			$this->db->set('title',$post['title']);
			$this->db->set('body',$_POST['body']);
			if($post['id'] ==  'new')
			{
				//$this->db->set('creatorid',$uid);
				$this->db->set('image',$filename);
				$this->db->insert('news');
			}
			else {
				//$this->db->set('modifierid',$uid);
				//$this->db->set('modifieddate',date('Y-m-d H:i:s'));
				if($filename != '')
					$this->db->set('image',$filename);
				$this->db->where('id',$post['id']);
				$this->db->update('news');
			}
			return true;
		}
		return false;
	}

	function getById($id)
	{
		$this->db->where('id',$id);
		$res = $this->db->get('news');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function getByStringId($string_id)
	{
		$this->db->where('string_id',$string_id);
		$res = $this->db->get('news');
		if($res->num_rows() > 0)
			return $res->row();
		else
			return null;
	}

	function Delete($id)
	{
		$this->db->where('id',$id);
		$this->db->set('status','Trash');
		$this->db->update('news');
	}
}
?>
