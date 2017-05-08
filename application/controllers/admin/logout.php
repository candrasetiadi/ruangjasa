<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

	public function index()
	{
		delete_cookie('user');
		$this->session->sess_destroy();
		redirect('login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
