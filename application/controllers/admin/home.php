<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	private $found = false;
	public function index()
	{
		$menus = $this->getMenus();
		$this->CheckHome($menus);

		$this->Render('home','home','Home');
	}

	private function CheckHome($arr = array())
	{
		if(!$this->found && is_array($arr))
		{
			foreach($arr as $k=>$m)
			{
				if(isset($m->home) && $m->home)
				{
					redirect('admin/'.$k);
					$this->found = true;
				}
				if(!$this->found && isset($m->child))
				{
					$this->CheckHome($m->child);
				}
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
