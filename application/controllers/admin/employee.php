<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends MY_Controller {

	public function index()
	{
		$this->Render('employee','employee','Employee');
	}

	function process()
	{
		$post = $this->PopulatePost();
		$param = array("id","title","body","file");
		if($this->checkParameter($param))
		{
			$filename = '';
			if(isset($_FILES['file']))
			{
				$f = $_FILES['file'];
				if(stripos($f["type"],'image') === false)
				{
					echo json_encode(
						array(
							'error_code'=>1,
							'error'=>'File type is not allowed'
						)
					);
				}
				$f = $_FILES['file'];
				$names = explode('.',$f['name']);
				$ex = $names[count($names)-1];
				$filename = $names[count($names)-2].'_'.time().'.'.$ex;
				if(!$this->uploadImage($f,$filename,'./uploads/news/','./uploads/news_thumb/',1110,400))
				{
					echo json_encode(
						array(
							'error_code'=>1,
							'error'=>'Upload file is failed, please contact your administrator.'
						)
					);
					return;
				}
			}
			$this->load->model('newsdb');
			if($this->newsdb->process($post,$filename/*,$this->getUserId()*/))
			{
				echo json_encode(
					array(
						'error_code'=>0,
						'error'=>''
					)
				);
			}
			else {
				echo json_encode(
					array(
						'error_code'=>1,
						'error'=>'News already in database, please consider new title'
					)
				);
			}
		}
		else
		{
			echo json_encode(
				array(
					'error_code'=>'403',
					'error'=>'Invalid operation.'
				)
			);
		}
	}

	function getbyid()
	{
		$post = $this->PopulatePost();
		$param = array("id");
		if($this->checkParameter($param))
		{
			$this->load->model('newsdb');
			$obj = $this->newsdb->getById($post['id']);
			if($obj != null)
			{
				$obj->error_code = 0;
				$obj->message = '';
				echo json_encode($obj);
			}
			else
			{
				echo json_encode(
					array(
						'error_code'=>'403',
						'error'=>'Invalid operation.'
					)
				);
			}
		}
	}

	function delete()
	{
		$post = $this->PopulatePost();
		$param = array("data");
		if($this->checkParameter($param))
		{
			$this->load->model('newsdb');
			$obj = $this->newsdb->getById($post['data']);
			if($obj != null)
			{
				if(file_exists('./uploads/news/'.$obj->image))
					unlink('./uploads/news/'.$obj->image);
				if(file_exists('./uploads/news_thumb/'.$obj->image))
					unlink('./uploads/news_thumb/'.$obj->image);
				$this->newsdb->delete($post['data']);
				echo json_encode(
					array(
						'error_code'=>'0',
						'error'=>'Success delete.'
					)
				);
			}
			else
			{
				echo json_encode(
					array(
						'error_code'=>'403',
						'error'=>'Invalid operation.'
					)
				);
			}
		}
	}

	function get(){
		$aColumns = array('createdate','title','image','id','string_id');
		$sIndexColumn = "id";
		$sTable = "news";

		$add_where = "";
		/*
		* Paging
		*/
		$data = $this->getdata($aColumns,$sIndexColumn,$sTable,$add_where);

		$output = $data['output'];
		$datares = $data['datares'];
		if(!empty($datares))
		{
			foreach($datares->result_array() as $aRow)
			{
				$row = array();
				for ( $i=0 ; $i<count($aColumns) ; $i++ )
				{
					if ( $aColumns[$i] == 'id' )
					{
						$row['action'] = '<a href="#" class="btnEdit" data="'.$aRow['id'].'">Edit</a> <a href="#" class="btnDelete"  data="'.$aRow['id'].'">Delete</a>';
					}
					else if($aColumns[$i] == 'string_id')
					{
					}
					else if ( $aColumns[$i] == 'image' )
					{
						$row[$aColumns[$i]] = '<img src="'.base_url().'uploads/news_thumb/'.$aRow[ $aColumns[$i] ].'" />';
					}
					else if ( $aColumns[$i] == 'createdate' )
					{
						$row[$aColumns[$i]] = date('j M Y H:i:s',strtotime($aRow[$aColumns[$i]]));
					}
					else if ( $aColumns[$i] != ' ' )
					{
						/* General output */
						$row[$aColumns[$i]] = $aRow[ $aColumns[$i] ];
					}
				}
				$output['data'][] = $row;
			}
		}

		echo json_encode( $output );
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
