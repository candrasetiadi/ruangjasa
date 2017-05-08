<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function check_string_id($table,$stringfield,$stringid)
  {
		$this->db->where($stringfield,$stringid);
		$res = $this->db->get($table);
		return $res->row();
  }

	function buildstringid($string_id,$addition = '')
	{
		$string_id = strtolower(str_replace(' ','-',$string_id.$addition));
		$string_id = strtolower(str_replace('%','',$string_id));
		$string_id = strtolower(str_replace('(','',$string_id));
		$string_id = strtolower(str_replace(')','',$string_id));
		$string_id = strtolower(str_replace('/','',$string_id));
		$string_id = strtolower(str_replace('+','',$string_id));
		$ret = '';
		for($i=0;$i<strlen($string_id);$i++)
		{
			if(is_numeric($string_id[$i]))
			{
				$ret .= $string_id[$i];
			}
			if($string_id[$i] == '-')
			{
				$ret .= $string_id[$i];
			}
			if($string_id[$i] >= 'A' && $string_id[$i] <= 'Z')
			{
				$ret .= $string_id[$i];
			}
			if($string_id[$i] >= 'a' && $string_id[$i] <= 'z')
			{
				$ret .= $string_id[$i];
			}
		}
		return $ret;
	}

	function createStringId($name,$id,$table,$stringfield = 'string_id', $field_id = 'id')
	{
		$addition = 1;
		$stringid = $this->buildstringid($name);
		$cekstring = $this->check_string_id($table,$stringfield,$stringid);
		while($cekstring != NULL)
		{
			if($cekstring->$field_id == $id)
				break;
			$stringid = $this->buildstringid($name,$addition);
			$cekstring = $this->check_string_id($table,$stringfield,$stringid);
			$addition++;
		}
		return $stringid;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
