<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('user_login')<>''){
			$data['content'] = '';
			$this->load->view('template',$data);
		}else{
			$this->load->view('login');	
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */