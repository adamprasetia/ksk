<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_lib{
	protected $ci;
	public function __construct(){
		$this->ci = &get_instance();
		$this->ci->load->model('user_mdl');
	}
	public function get_username(){
		$result = $this->ci->user_mdl->get_from_field('username',$this->ci->session->userdata('user_login'))->row();
		return $result->fullname;
	}
	public function get_limit(){
		$result = $this->ci->input->get('limit');
		if($result==''){
			$data = 10;
		}else{
			$data = $result;
		}
		return $data;		
	}
	public function get_offset(){
		$result = $this->ci->input->get('offset');
		if($result==''){
			$data = 0;
		}else{
			$data = $result;
		}
		return $data;		
	}
	public function order_type($field){
		$order_column = $this->ci->input->get('order_column');
		$order_type = $this->ci->input->get('order_type');
		if($order_type=='asc' && $order_column==$field){
			return 'desc';	
		}else{
			return 'asc';
		}
	}
	public function order_icon($field){
		$order_column = $this->ci->input->get('order_column');
		$order_type = $this->ci->input->get('order_type');
		if($order_column==$field){
			switch($order_type){
				case 'asc':return '<span class="glyphicon glyphicon-chevron-up"></span>';break;
				case 'desc':return '<span class="glyphicon glyphicon-chevron-down"></span>';break;
				default:return "";break;
			}	
		}		
	}		
	public function get_order_column($field = 'id'){
		$result = $this->ci->input->get('order_column');
		if($result==''){
			$data = $field;
		}else{
			$data = $result;
		}
		return $data;		
	}
	public function get_order_type($id = 'desc'){
		$result = $this->ci->input->get('order_type');
		if($result==''){
			$data = $id;
		}else{
			$data = $result;
		}
		return $data;		
	}	
}
