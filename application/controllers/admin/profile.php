<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function index()
	{
		if($this->input->post())
			$this->postProfile();
		$this->Render('profile','profile','Profile');
	}

	private function postProfile()
	{
		$this->load->model('userdb');
		$post = $this->PopulatePost();
		$param = array("old_pass","new_pass","conf_pass");
		if($this->checkParameter($param))
		{
			if($post['new_pass'] == $post['conf_pass'])
			{
				if($this->userdb->CheckOldPassword($this->getUserId(),$post['old_pass']))
				{
					$this->userdb->changePassword($this->getUserId(),$post['new_pass']);
					$this->session->set_userdata('succ_msg','Success Change password.');
				}
				else
				{
					$this->session->set_userdata('err_msg','Old Password is different.');
				}
			}
			else
			{
				$this->session->set_userdata('err_msg','Confirm Password is different.');
			}
			redirect('profile');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */