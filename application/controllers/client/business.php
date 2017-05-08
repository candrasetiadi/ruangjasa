<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Business extends MY_Controller {

	public function index() {
		$this->Render('business','business','Business', array(), 'default');
	}
	
}
