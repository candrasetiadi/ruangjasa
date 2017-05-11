<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	public function index()
	{
		$this->load->model('servicesdb');

		$data['services'] = $this->servicesdb->get_services();

		$this->Render('home','home','Home', $data);
	}

	public function process()
	{
		$post = $this->PopulatePost();
		$param = array("name","email","subject","message");
		if($this->checkParameter($param))
		{
			$this->send_email($post['email'],'Thank you for contact us','We have received your message and will respond to you within 2-3 working days.');


			$email_admin = '';

			$this->load->model('generaldb');
			$gen = $this->generaldb->Get();

			if($gen != null)
				$email_admin = $gen->admin_email;

			if($email_admin != '')
				$this->send_email($email_admin,'Message received','Dear Admin,<br>A message is received with detail below:<br><br><table><tr><td style="width:20%;">Name</td><td style="width:5%">:</td><td style="width:60%;">'.$post['name'].'</td></tr><tr><td style="width:20%;">Email</td><td style="width:5%">:</td><td style="width:60%;">'.$post['email'].'</td></tr><tr><td style="width:20%;">subject</td><td style="width:5%">:</td><td style="width:60%;">'.$post['subject'].'</td></tr><tr><td style="width:20%;">Message</td><td style="width:5%">:</td><td style="width:60%;">'.nl2br($post['message']).'</td></tr></table>');

			$this->load->model('contactdb');
			$this->contactdb->insert($post);
			echo json_encode(
				array(
					'error_code'=>'',
					'message'=>'Thank you for send us message.'
				)
			);
		}
	}
}
