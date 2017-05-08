<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
		if($this->input->post())
			$this->postlogin();
		$data = array();
		$this->Render('login','login','Login',$data,'login');
	}

	private function postlogin()
	{
		$post = $this->PopulatePost();
		$param = array("username","password");
		if($this->checkParameter($param))
		{
			$this->load->model('userdb');
			$user = $this->userdb->CheckLogin($post);


			if($user != null)
			{
				if(!isset($post['remember']))
				{
					$cookie = array(
						'name'   => 'user',
						'value'  => $user->id,
						'expire' => time()+86500
					);
					set_cookie($cookie);
				}
				$this->session->set_userdata('user',$user->user_id);
				redirect('admin/home');
			}
			else
				$this->session->set_userdata('err_msg','Login and password combination is invalid.');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
