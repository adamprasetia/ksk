<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komponen extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('komponen_mdl');
	}
	public function index(){
		$offset = $this->general_lib->get_offset();
		$limit = $this->general_lib->get_limit();
		$total = $this->komponen_mdl->count_all();

		$xdata['action'] = 'komponen/search'.$this->_filter();
		$xdata['action_delete'] = 'komponen/delete'.$this->_filter();
		$xdata['add_btn'] = anchor('komponen/add','Tambah',array('class'=>'btn btn-warning btn-sm'));
		$xdata['delete_btn'] = '<button id="delete-btn" class="btn btn-warning btn-sm">Delete Checked</button>';

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'nama'=>'Nama',
			'group_nama'=>'Group',
			'satuan_nama'=>'Satuan',
			'harga'=>'Harga',
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('komponen'.$this->_filter(array('order_column'=>"$r",'order_type'=>$this->general_lib->order_type($r))),"$value ".$this->general_lib->order_icon("$r"));
		}		
		$heading[] = 'Action';
		$this->table->set_heading($heading);
		$result = $this->komponen_mdl->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				$r->nama,
				$r->group_nama,
				$r->satuan_nama,
				array('data'=>number_format($r->harga),'align'=>'right'),
				anchor('komponen/edit/'.$r->id.$this->_filter(),'Edit')
				."&nbsp;|&nbsp;".anchor('komponen/delete/'.$r->id.$this->_filter(),'Delete',array('onclick'=>"return confirm('you sure')"))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url("komponen".$this->_filter());
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('komponen_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'group'=>$this->input->post('group'),
			'satuan'=>$this->input->post('satuan')
		);
		redirect('komponen'.$this->_filter($data));		
	}
	public function _filter($add = array()){
		$str = '?avenger=1';
		$data = array('order_column'=>0,'order_type'=>0,'limit'=>0,'offset'=>0,'search'=>0,'group'=>0,'satuan'=>0);
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
			'nama'=>$this->input->post('nama'),
			'group'=>$this->input->post('group'),
			'satuan'=>$this->input->post('satuan'),
			'harga'=>$this->input->post('harga')
		);
		return $data;		
	}
	private function _set_rules(){
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('group','Group','required|trim');
		$this->form_validation->set_rules('satuan','Satuan','required|trim');
		$this->form_validation->set_rules('harga','Harga','required|trim');
	}
	public function add(){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['action'] = 'komponen/add'.$this->_filter();
			$xdata['breadcrumb'] = 'komponen'.$this->_filter();
			$xdata['heading'] = 'New';
			$xdata['owner'] = '';
			$data['content'] = $this->load->view('komponen_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_create'] = $this->session->userdata('user_login');
			$data['date_create'] = date('Y-m-d H:i:s');
			$this->komponen_mdl->add($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Tambah Data Sukses</div>');
			redirect('komponen/add'.$this->_filter());
		}
	}
	public function edit($id){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['row'] = $this->komponen_mdl->get_from_field('id',$id)->row();
			$xdata['action'] = 'komponen/edit/'.$id.$this->_filter();
			$xdata['breadcrumb'] = 'komponen'.$this->_filter();
			$xdata['heading'] = 'Update';
			$xdata['owner'] = owner($xdata['row']);
			$data['content'] = $this->load->view('komponen_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_update'] = $this->session->userdata('user_login');
			$data['date_update'] = date('Y-m-d H:i:s');
			$this->komponen_mdl->edit($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Edit Data Sukses</div>');
			redirect('komponen/edit/'.$id.$this->_filter());
		}
	}
	public function delete($id=''){
		if($id<>''){
			$this->komponen_mdl->delete($id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->komponen_mdl->delete($c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">Delete Data Sukses</div>');
		redirect('komponen'.$this->_filter());
	}
	public function get_harga($id=''){
		$result = $this->komponen_mdl->get_from_field('id',$id);
		$harga = 0;
		if($result->num_rows()>0){
			$harga =  $result->row()->harga;
		}
		echo number_format($harga);
	}	
}