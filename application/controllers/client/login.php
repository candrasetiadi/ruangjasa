<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index() {
		$this->Render('login','login','Login', array(), 'login_page');
	}

	public function register() {
		$this->Render('register','register','Register', array(), 'login_page');
	}

	
}
