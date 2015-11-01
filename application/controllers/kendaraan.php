<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kendaraan extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('kendaraan_mdl');
	}
	public function index(){
		$offset = $this->general_lib->get_offset();
		$limit = $this->general_lib->get_limit();
		$total = $this->kendaraan_mdl->count_all();

		$xdata['action'] = 'kendaraan/search'.$this->_filter();
		$xdata['action_delete'] = 'kendaraan/delete'.$this->_filter();
		$xdata['add_btn'] = anchor('kendaraan/add','Tambah',array('class'=>'btn btn-warning btn-sm'));
		$xdata['delete_btn'] = '<button id="delete-btn" class="btn btn-warning btn-sm">Delete Checked</button>';

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'nopol'=>'Nomor Polisi',
			'tipe_nama'=>'Tipe',
			'nomes'=>'Nomor Mesin',
			'nocha'=>'Nomor Chassis',
			'status_nama'=>'Status'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('kendaraan'.$this->_filter(array('order_column'=>"$r",'order_type'=>$this->general_lib->order_type($r))),"$value ".$this->general_lib->order_icon("$r"));
		}		
		$heading[] = 'Action';
		$this->table->set_heading($heading);
		$result = $this->kendaraan_mdl->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				$r->nopol,
				$r->tipe_nama,
				$r->nomes,
				$r->nocha,
				'<label class="label label-'.($r->status_nama=='On'?'success':'danger').'">'.$r->status_nama.'</label>',
				anchor('kendaraan/edit/'.$r->id.$this->_filter(),'Edit')
				."&nbsp;|&nbsp;".anchor('kendaraan/delete/'.$r->id.$this->_filter(),'Delete',array('onclick'=>"return confirm('you sure')"))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = 'Showing '.($offset+1).' to '.($offset+$limit).' of '.number_format($total).' entries';
		
		$config = pag_tmp();
		$config['base_url'] = site_url("kendaraan".$this->_filter());
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('kendaraan_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'tipe'=>$this->input->post('tipe'),
			'status'=>$this->input->post('status')
		);
		redirect('kendaraan'.$this->_filter($data));		
	}
	public function _filter($add = array()){
		$str = '?avenger=1';
		$data = array('order_column'=>0,'order_type'=>0,'limit'=>0,'offset'=>0,'search'=>0,'tipe'=>0,'status'=>0);
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
			'nopol'=>$this->input->post('nopol'),
			'tipe'=>$this->input->post('tipe'),
			'nomes'=>$this->input->post('nomes'),
			'nocha'=>$this->input->post('nocha'),
			'status'=>$this->input->post('status')
		);
		return $data;		
	}
	private function _set_rules(){
		$this->form_validation->set_rules('nopol','Nomor Polisi','required|trim');
		$this->form_validation->set_rules('tipe','Tipe','required|trim');
		$this->form_validation->set_rules('nomes','Nomor Mesin','required|trim');
		$this->form_validation->set_rules('nocha','Nomor Chassis','required|trim');
		$this->form_validation->set_rules('status','Status','required|trim');
	}
	public function add(){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['action'] = 'kendaraan/add'.$this->_filter();
			$xdata['breadcrumb'] = 'kendaraan'.$this->_filter();
			$xdata['heading'] = 'New';
			$xdata['owner'] = '';
			$data['content'] = $this->load->view('kendaraan_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_create'] = $this->session->userdata('user_login');
			$data['date_create'] = date('Y-m-d H:i:s');
			$this->kendaraan_mdl->add($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Tambah Data Sukses</div>');
			redirect('kendaraan/add'.$this->_filter());
		}
	}
	public function edit($id){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['row'] = $this->kendaraan_mdl->get_from_field('id',$id)->row();
			$xdata['action'] = 'kendaraan/edit/'.$id.$this->_filter();
			$xdata['breadcrumb'] = 'kendaraan'.$this->_filter();
			$xdata['heading'] = 'Update';
			$xdata['owner'] = owner($xdata['row']);
			$data['content'] = $this->load->view('kendaraan_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_update'] = $this->session->userdata('user_login');
			$data['date_update'] = date('Y-m-d H:i:s');
			$this->kendaraan_mdl->edit($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Edit Data Sukses</div>');
			redirect('kendaraan/edit/'.$id.$this->_filter());
		}
	}
	public function delete($id=''){
		if($id<>''){
			$this->kendaraan_mdl->delete($id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->kendaraan_mdl->delete($c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">Delete Data Sukses</div>');
		redirect('kendaraan'.$this->_filter());
	}
	public function get_kendaraan($id){
		$result = $this->kendaraan_mdl->get_from_field('id',$id)->row_array();
		echo json_encode($result);
	}
}