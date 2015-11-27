<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta"); 
		$this->load->model('user_mdl');
	}
	public function index(){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->load->view('login');
		}else{
			$username = $this->input->post('username');
			$user = $this->user_mdl->get_from_field('username',$username)->row();
			$this->_date_login($user->id);
			$this->session->set_userdata('user_login',$username);
			$this->session->set_userdata('user_level',$user->level);
			redirect('home');
		}
	}
	private function _date_login($id){
		$browser = getBrowser();
		$data = array(
			'ip_login'=>$_SERVER['REMOTE_ADDR']
			,'user_agent'=>$browser['platform']."(".$browser['name']." ".$browser['version'].")"
			,'date_login'=>date('Y-m-d H:i:s')
		);
		$this->user_mdl->edit($id,$data);
	}	
	private function _set_rules(){
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim|callback__login_check');
	}
	public function _login_check(){
		$result = $this->user_mdl->get_from_field('username',$this->input->post('username'));
		if($result->num_rows()>0 && $result->row()->password==$this->input->post('password') && $result->row()->status=='ON'){
			return true;
		}else{
			$this->form_validation->set_message('_login_check', 'Login Failed!!!');
			return false;		
		}
	}
}
