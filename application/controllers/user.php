<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$offset = $this->general_lib->get_offset();
		$limit = $this->general_lib->get_limit();
		$total = $this->user_mdl->count_all();

		$xdata['action'] = 'user/search'.$this->_filter();
		$xdata['action_delete'] = 'user/delete'.$this->_filter();
		$xdata['add_btn'] = anchor('user/add','<span class="glyphicon glyphicon-plus"></span> Tambah',array('class'=>'btn btn-success btn-sm'));
		$xdata['delete_btn'] = '<button id="delete-btn" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete Checked</button>';

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'fullname'=>'Fullname'
			,'username'=>'Username'
			,'level_name'=>'Level'
			,'ip_login'=>'Last IP Login'
			,'user_agent'=>'Last User Agent'
			,'date_login'=>'Last Login'
			,'status_name'=>'Status'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('user'.$this->_filter(array('order_column'=>"$r",'order_type'=>$this->general_lib->order_type($r))),"$value ".$this->general_lib->order_icon("$r"));
		}		
		$heading[] = 'Action';
		$this->table->set_heading($heading);
		$result = $this->user_mdl->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				$r->fullname,
				$r->username,
				$r->level_nama,
				$r->ip_login,
				$r->user_agent,
				$r->date_login,			
				'<label class="label label-'.($r->status_kode=='ON'?'success':'danger').'">'.$r->status_nama.'</label>',
				anchor('user/edit/'.$r->id.$this->_filter(),'Edit')
				."&nbsp;|&nbsp;".anchor('user/delete/'.$r->id.$this->_filter(),'Delete',array('onclick'=>"return confirm('you sure')"))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url("user".$this->_filter());
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('user_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'level'=>$this->input->post('level'),
			'status'=>$this->input->post('status')
		);
		redirect('user'.$this->_filter($data));		
	}
	public function _filter($add = array()){
		$str = '?avenger=1';
		$data = array('order_column'=>0,'order_type'=>0,'limit'=>0,'offset'=>0,'search'=>0,'level'=>0,'status'=>0);
		$result = array_diff_key($data,$add);
		foreach($result as $r => $val){			
			if($this->input->get($r)<>''){
				$str .="&$r=".$this->input->get($r);
			}
		}
		if($add<>''){
			foreach($add as $r => $val){
				if($val <> ''){
					$str .="&$r=".$val;
				}
			}
		}
		return $str;
	}	
	private function _field(){
		$data = array(
			'fullname'=>$this->input->post('fullname'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'level'=>$this->input->post('level'),
			'status'=>$this->input->post('status')
		);
		return $data;		
	}
	private function _set_rules(){
		$this->form_validation->set_rules('fullname','Fullname','required|trim');
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
	}
	public function add(){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['action'] = 'user/add'.$this->_filter();
			$xdata['breadcrumb'] = 'user'.$this->_filter();
			$xdata['heading'] = 'New';
			$xdata['owner'] = '';
			$data['content'] = $this->load->view('user_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_create'] = $this->session->userdata('user_login');
			$data['date_create'] = date('Y-m-d H:i:s');
			$this->user_mdl->add($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Tambah Data Sukses</div>');
			redirect('user/add'.$this->_filter());
		}
	}
	public function edit($id){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['row'] = $this->user_mdl->get_from_field('id',$id)->row();
			$xdata['action'] = 'user/edit/'.$id.$this->_filter();
			$xdata['breadcrumb'] = 'user'.$this->_filter();
			$xdata['heading'] = 'Update';
			$xdata['owner'] = owner($xdata['row']);
			$data['content'] = $this->load->view('user_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_update'] = $this->session->userdata('user_login');
			$data['date_update'] = date('Y-m-d H:i:s');
			$this->user_mdl->edit($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Edit Data Sukses</div>');
			redirect('user/edit/'.$id.$this->_filter());
		}
	}
	public function delete($id=''){
		if($id<>''){
			$this->user_mdl->delete($id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->user_mdl->delete($c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">Delete Data Sukses</div>');
		redirect('user'.$this->_filter());
	}
}