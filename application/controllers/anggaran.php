<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggaran extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('anggaran_mdl');
	}
	public function index(){
		$offset = $this->general_lib->get_offset();
		$limit = $this->general_lib->get_limit();
		$total = $this->anggaran_mdl->count_all();

		$xdata['action'] = 'anggaran/search'.$this->_filter();
		$xdata['action_delete'] = 'anggaran/delete'.$this->_filter();
		$xdata['add_btn'] = anchor('anggaran/add','<span class="glyphicon glyphicon-plus"></span> Tambah',array('class'=>'btn btn-success btn-sm'));
		$xdata['delete_btn'] = '<button id="delete-btn" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete Checked</button>';

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'norek'=>'Nomor Rekening',
			'tanggal'=>'Tanggal',
			'tipe_nama'=>'Tipe',
			'jumlah'=>'Jumlah',
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('anggaran'.$this->_filter(array('order_column'=>"$r",'order_type'=>$this->general_lib->order_type($r))),"$value ".$this->general_lib->order_icon("$r"));
		}		
		$heading[] = 'Action';
		$this->table->set_heading($heading);
		$result = $this->anggaran_mdl->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				$r->norek,
				format_dmy($r->tanggal),
				$r->tipe_nama,
				array('data'=>number_format($r->jumlah),'align'=>'right'),
				anchor('anggaran/edit/'.$r->id.$this->_filter(),'Edit')
				."&nbsp;|&nbsp;".anchor('anggaran/delete/'.$r->id.$this->_filter(),'Delete',array('onclick'=>"return confirm('you sure')"))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url("anggaran".$this->_filter());
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('anggaran_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'tipe'=>$this->input->post('tipe')
		);
		redirect('anggaran'.$this->_filter($data));		
	}
	public function _filter($add = array()){
		$str = '?avenger=1';
		$data = array('order_column'=>0,'order_type'=>0,'limit'=>0,'offset'=>0,'search'=>0,'tipe'=>0);
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
			'norek'=>$this->input->post('norek'),
			'tanggal'=>format_ymd($this->input->post('tanggal')),
			'tipe'=>$this->input->post('tipe'),
			'jumlah'=>str_replace(',', '', $this->input->post('jumlah'))
		);
		return $data;		
	}
	private function _set_rules(){
		$this->form_validation->set_rules('norek','No Rekening','required|trim');
		$this->form_validation->set_rules('tipe','Tipe','required|trim');
		$this->form_validation->set_rules('jumlah','Jumlah','required|trim');
	}
	public function add(){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['action'] = 'anggaran/add'.$this->_filter();
			$xdata['breadcrumb'] = 'anggaran'.$this->_filter();
			$xdata['heading'] = 'New';
			$xdata['owner'] = '';
			$data['content'] = $this->load->view('anggaran_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_create'] = $this->session->userdata('user_login');
			$data['date_create'] = date('Y-m-d H:i:s');
			$this->anggaran_mdl->add($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Tambah Data Sukses</div>');
			redirect('anggaran/add'.$this->_filter());
		}
	}
	public function edit($id){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['row'] = $this->anggaran_mdl->get_from_field('id',$id)->row();
			$xdata['action'] = 'anggaran/edit/'.$id.$this->_filter();
			$xdata['breadcrumb'] = 'anggaran'.$this->_filter();
			$xdata['heading'] = 'Update';
			$xdata['owner'] = owner($xdata['row']);
			$data['content'] = $this->load->view('anggaran_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_update'] = $this->session->userdata('user_login');
			$data['date_update'] = date('Y-m-d H:i:s');
			$this->anggaran_mdl->edit($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Edit Data Sukses</div>');
			redirect('anggaran/edit/'.$id.$this->_filter());
		}
	}
	public function delete($id=''){
		if($id<>''){
			$this->anggaran_mdl->delete($id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->anggaran_mdl->delete($c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">Delete Data Sukses</div>');
		redirect('anggaran'.$this->_filter());
	}
}