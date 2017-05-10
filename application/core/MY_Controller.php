<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('app_id',1);
		if(stripos($_SERVER["REQUEST_URI"],'/admin') !== FALSE )
		{
			$allow = $this->CheckAllow();
			if((stripos($_SERVER["REQUEST_URI"],'/admin/login') === FALSE))
			{
				if(!$allow)
				{
						redirect('admin/login');
				}
				if(!$this->uri->segment(2))
					redirect('admin/home');
			}
			else
			{
				if($allow)
				{
						redirect('admin/home');
				}
			}
		}
		else
		{
			$this->template->set_theme('client');
		}
	}

	function getLoginInfo()
	{
		$this->load->model('userdb');
		$username = $this->session->userdata('user');
		if($username == '')
		{
			$username = get_cookie('user');
		}
		if($username != '')
			$user = $this->userdb->getLoginInfo($username);
		else
			$user = null;
		return $user;
	}

	/*production function*/
	function getUserId()
	{
		$user = $this->getLoginInfo();
		if($user != null)
		{
			return $user->user_id;
		}
		else
			return null;
	}

	function CheckAllow()
	{
		$return = false;
		$user = $this->getLoginInfo();
		if($user != null)
			$return = true;
		return $return;
	}

	function Render($view,$state,$title='',$data=array(),$layout='default'){
		if(stripos($_SERVER["REQUEST_URI"],'/admin'))
		{
			if(stripos($_SERVER["REQUEST_URI"],'/admin/login') !== FALSE || $this->uri->rsegment(1) == 'login')
			{
				$layout = 'login';
			}
			else
			{
				$user = $this->getLoginInfo();
				$this->template->set('fullname',$user->user_name);
				$menus = $this->getMenus();
				$this->template->set('menus',$menus);
			}
		}

		if($title != '')
			$this->template->title('Ruangjasa',$title);
		$this->template->set('state',$state);
		if($this->session->userdata('succ_msg') != '')
		{
			$this->template->set('succ_msg',$this->session->userdata('succ_msg'));
			$this->session->unset_userdata('succ_msg');
		}
		if($this->session->userdata('err_msg') != '')
		{
			$this->template->set('err_msg',$this->session->userdata('err_msg'));
			$this->session->unset_userdata('err_msg');
		}

		// print_r($this->template); die();
		$this->template
		->set_layout($layout)
		->build($view,$data);
	}

	function PopulatePost()
	{
		$data = array();
		foreach($_POST as $key => $value)
		{
			if($key != 'btnSubmit' )
			if(!is_array($value))
				$data[$key] = urldecode($this->Sanitize($value));
			else
				$data[$key] = $value;
		}
		return $data;
	}

	function getMenus()
	{
		$menus = array(
			'services_category'=>(object)array(
				'title'=>'  Kategori Jasa',
				'class'=>'fa-ticket'
			),
			'services'=>(object)array(
				'title'=>'  Jasa',
				'class'=>'fa-ticket'
			),
			'services/request_form'=>(object)array(
				'title'=>'  Form Request Jasa',
				'class'=>'fa-ticket'
			),			
			'services/request_form_options'=>(object)array(
				'title'=>'  Form Request Options',
				'class'=>'fa-ticket'
			),
			'users'=>(object)array(
				'title'=>'  Users',
				'class'=>'fa-users',
				// 'home'=>true
			// ),
			// 'Test'=>(object)array(
			// 	'title'=>'  Test',
			// 	'class'=>'fa-flag',
			// 	'child'=>array(
			// 		'news/test'=>(object)array(
			// 			'title'=>'Test News'
			// 		)
			// 	)
			)
			);
		return $menus;
	}

	function Sanitize($someString)
	{
		return $this->db->escape_str(htmlspecialchars(stripslashes(trim($someString)), ENT_QUOTES));
	}

	function checkParameter($param)
	{
		$post = $this->PopulatePost();
		$pass = true;
		foreach($param as $r)
		{
			if(!isset($post[$r]) && !isset($_FILES[$r]))
			{
				$pass = false;
				break;
			}
		}
		if(!$pass)
		{
			if($this->input->is_ajax_request())
			{
				echo json_encode(
					array(
						'error_code'=>403,
						'error'=>'Request not allowed'
					)
				);
			}
			else
				redirect(((stripos($_SERVER["REQUEST_URI"],'/client') !== FALSE)?'client/':'').'pagenotfound');
		}
		return $pass;
	}

	function return_empty()
	{
		$output = array(
			"draw" => 0,
			"recordsTotal" => 0,
			"recordsFiltered" => 0,
			"data" => array()
		);
		return array('output'=>$output,'datares'=>array() );
	}

	public function getdata($aColumns = array(),$sIndexColumn = '',$sTable ='',$add_where = '')
	{
		if(empty($aColumns) || $sIndexColumn == '' || $sTable == '')
			return $this->return_empty();
		$post = $this->PopulatePost();
		$sLimit = "";
		if ( isset( $post['start'] ) && $post['length'] != '-1' )
		{
			$sLimit = "LIMIT ".$this->db->escape_str( $post['start'] ).", ".
			$this->db->escape_str( $post['length'] );
		}

		$sOrder = '';
		if(isset($post['order']) && count($post['order']) > 0)
		{
			$sOrder = "ORDER BY  ";
			foreach($post['order'] as $o)
			{
				$sOrder .= $aColumns[ intval( $o['column'] ) ]."
				".$this->db->escape_str( $o['dir'] ) .", ";
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}

		$sWhere = "";
		if ( isset($post['search']) && $post['search'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$this->db->escape_str( $post['search']['value'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}

		if($add_where != '')
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= " ".$add_where." ";
		}
		/*
		* SQL queries
		* Get data to display
		*/
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
		$datares = $this->db->query($sQuery);

		/* Data set length after filtering */


		$sQuery = "
			SELECT FOUND_ROWS() as count
			";

		$datacount = $this->db->query($sQuery);
		$iFilteredTotal = $datacount->row()->count;

		/* Total data set length */

		if($add_where != '')
		{
			$sQuery = "
				SELECT COUNT(".$sIndexColumn.") as count
				FROM   $sTable ".$sWhere;
		}
		else
		{
			$sQuery = "
				SELECT COUNT(".$sIndexColumn.") as count
				FROM   $sTable ";
		}

		$datacount = $this->db->query($sQuery);
		$iTotal = $datacount->row()->count;

		/*
		* Output
		*/
		$output = array(
			"draw" => isset($post['draw']) ? intval($post['draw']) : 0,
			"recordsTotal" => $iTotal,
			"recordsFiltered" => $iFilteredTotal,
			"data" => array()
		);

		return array('output'=>$output,'datares'=>$datares);
	}

	function uploadImage($file,$name,$location,$thumb = '',$width = 0,$height = 0,$delete = false)
	{
		$fl = $location.$name;
		$oldname = '';

		$size=$file['size'];

		if($size>5242880)
		{
			//echo "error file size > 5 MB";
			unlink($file['tmp_name']);
			return;
		}

		if(file_exists($location.$name))
		{
			if(!$delete)
			{
				$names = explode('.',$name);
				$newnames = '';
				foreach($names as $k=>$n)
				{
					if($k < count($names)-1)
					{
						if($newnames != '')
							$newnames .= '.';
						$newnames .= $n;
					}
				}
				$oldname = $location.$newnames.'_old_'.time().'.'.$names[count($names)-1];
				rename($location.$name,$oldname);
			}
		}

		if (move_uploaded_file($file['tmp_name'], $fl)) {
			if($width != 0 && $height != 0)
			{
				$tmp = $location.'tmp_'.$name;
				rename($fl,$tmp);
				$config['image_library'] = 'gd2';
				$config['source_image']	= $tmp;
				$config['create_thumb'] = false;
				$config['quality'] = '100%';
				$config['maintain_ratio'] = FALSE;
				$config['new_image'] = $fl;
				$size = getimagesize($tmp);
				if($size[0]/$size[1] > $width/$height)
				{
					$config['width'] = $size[0]*$height/$size[1];
					$config['height']	= $height;
				}
				else
				{
					$config['width'] = $width;
					$config['height']	= $size[1]*$width/$size[0];
				}
				$this->load->library('image_lib', $config);
				$res = $this->image_lib->resize();
				if ( !$res)
				{
					// echo $this->image_lib->display_errors();
					rename($tmp,$fl);
					return false;
				}
				else
				{
					$this->image_lib->clear();
					if($thumb != '')
					{
						if($width/$height > 0)
							$divider = ceil($width/250);
						else
							$divider = ceil($height/250);
						$t_width = $width/$divider;
						$t_height = $height/$divider;
						$fl_thumb = $thumb.$name;
						$config['image_library'] = 'gd2';
						$config['source_image']	= $tmp;
						$config['create_thumb'] = false;
						$config['quality'] = '100%';
						$config['maintain_ratio'] = FALSE;
						$config['new_image'] = $fl_thumb;
						if($size[0]/$size[1] > $t_width/$t_height)
						{
							$config['width'] = $size[0]*$t_height/$size[1];
							$config['height']	= $t_height;
						}
						else
						{
							$config['width'] = $t_width;
							$config['height']	= $size[1]*$t_width/$size[0];
						}
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
					}
  			      		unlink($tmp);
				}


				return true;
			}
		} else {
			error_log("error ".$file['error']." --- ".$file['tmp_name']." %%% ".$file."($size)");
			if($oldname != '')
			{
				rename($oldname,$location.$name);
			}
			return false;
		}
		return false;
	}

	function send_email($to,$subject,$content)
	{
		// $configMail = $this->_getConfigMail();
		// $this->load->library('email', $configMail['config']);
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->from(EMAIL_FROM, EMAIL_FROM_NAME);
		$this->email->subject($subject);
		$data['title'] = $subject;
		$data['body'] = $content;
		$msg = $this->load->view('template_email',$data,true);
		$this->email->message($msg);
		// $this->email->from($configMail['from'], 'Wujudkan');

		$this->email->to($to);
		//$this->email->bcc("");
		try {
			$this->email->send();
		} catch (Exception $e) {
			error_log("Unsend email to ".$to);
		}
	}
}
?>
