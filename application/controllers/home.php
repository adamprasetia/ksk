<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('reminder_mdl');
		$this->load->helper('reminder');
	}
	public function index(){
		$this->table->set_template(tbl_tmp());
		$this->table->set_heading('No','Kendaraan','Terakhir Ganti Oli Mesin','Status');
		$result = $this->reminder_mdl->oli_mesin()->result();
		$i=1;
		foreach($result as $r){
			$this->table->add_row(
				$i++,
				anchor('kendaraan/detail/'.$r->kendaraan_id,$r->nopol,array('target'=>'_blank')),
				timeago(strtotime($r->tanggal)),
				olie_mesin_status(timeago(strtotime($r->tanggal)))
			);
		}
		$xdata['reminder_oli_mesin'] = $this->table->generate();
		$data['content'] = $this->load->view('home',$xdata,true);
		$this->load->view('template',$data);
	}
	public function change_password(){
		$this->form_validation->set_rules('old_pass','Old Password','required|trim|callback__check_old_pass');
		$this->form_validation->set_rules('new_pass','New Password','required|trim');
		$this->form_validation->set_rules('con_pass','Confirm Password','required|trim|matches[new_pass]');
		if($this->form_validation->run()===false){
			$data['content'] = $this->load->view('change_password','',true);
			$this->load->view('template',$data);
		}else{
			$id = $this->general_mdl->get_from_field('user','username',$this->session->userdata('user_login'))->row()->id;
			$data = array(
				'password'=>$this->input->post('new_pass')
			);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Ganti Password Berhasil</div>');
			$this->user_mdl->edit($id,$data);
			redirect('home/change_password');
		}
	}
	public function _check_old_pass(){
		$result = $this->general_mdl->get_from_field('user','username',$this->session->userdata('user_login'));
		if($result->num_rows() > 0){
			$old_pass = $result->row()->password;
			if($old_pass==$this->input->post('old_pass')){
				return true;
			}else{
				$this->form_validation->set_message('_check_old_pass', 'Old Password Failed!!!');					
				return false;
			}
		}				
		return false;
	}
	public function logout(){
		$this->session->unset_userdata('user_login');
		$this->session->unset_userdata('user_level');
		redirect('login');
	}
	public function tes(){
		$res = $this->reminder_mdl->olie()->result();
		echo "<pre>";
		print_r($res);
	}
}
