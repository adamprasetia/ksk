<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_mdl');
	}
	public function index(){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->load->view('login');
		}else{
			$data = array(
				'fullname'=>$this->input->post('fullname'),
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'level'=>3
			);
			$this->user_mdl->add($data);
			$this->load->view('reg_complete');
		}
	}
	private function _set_rules(){
		$this->form_validation->set_rules('fullname','Fullname','required|trim');
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('password_con','Password','required|trim|matches[password]');
	}
}