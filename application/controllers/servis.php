<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servis extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('servis_mdl');
		$this->load->model('servis_detail_mdl');
		$this->load->model('kendaraan_mdl');
		$this->load->model('komponen_mdl');
	}
	public function index(){
		$offset = $this->general_lib->get_offset();
		$limit = $this->general_lib->get_limit();
		$total = $this->servis_mdl->count_all();

		$xdata['action'] = 'servis/search'.$this->_filter();
		$xdata['action_delete'] = 'servis/delete'.$this->_filter();
		$xdata['add_btn'] = anchor('servis/add','<span class="glyphicon glyphicon-plus"></span> Tambah',array('class'=>'btn btn-success btn-sm'));
		$xdata['delete_btn'] = '<button id="delete-btn" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete Checked</button>';

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'nomor'=>'Nomor',
			'nopol'=>'Kendaraan',
			'tanggal'=>'Tanggal',
			'tipe_nama'=>'Tipe',
			'kilometer'=>'Kilometer',
			'jumlah_satuan'=>'Jumlah Satuan',
			'total_harga'=>'Total Harga',
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('servis'.$this->_filter(array('order_column'=>"$r",'order_type'=>$this->general_lib->order_type($r))),"$value ".$this->general_lib->order_icon("$r"));
		}		
		$heading[] = 'Action';
		$this->table->set_heading($heading);
		$result = $this->servis_mdl->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				$r->nomor,
				$r->nopol,
				format_dmy($r->tanggal),
				$r->tipe_nama,
				$r->kilometer,
				array('data'=>number_format($r->jumlah_satuan),'align'=>'right'),
				array('data'=>number_format($r->total_harga),'align'=>'right'),
				anchor('servis/edit/'.$r->id.$this->_filter(),'Edit')
				."&nbsp;|&nbsp;".anchor('servis/delete/'.$r->id.$this->_filter(),'Delete',array('onclick'=>"return confirm('you sure')"))
				."&nbsp;|&nbsp;".anchor('servis/print_detail/'.$r->id,'Print',array('target'=>'_blank'))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url("servis".$this->_filter());
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('servis_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'tipe'=>$this->input->post('tipe'),
			'kendaraan'=>$this->input->post('kendaraan'),
		);
		redirect('servis'.$this->_filter($data));		
	}
	public function _filter($add = array()){
		$str = '?avenger=1';
		$data = array('order_column'=>0,'order_type'=>0,'limit'=>0,'offset'=>0,'search'=>0,'tipe'=>0,'kendaraan'=>0);
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
			'nomor'=>$this->input->post('nomor'),
			'kendaraan'=>$this->input->post('kendaraan'),
			'tanggal'=>format_ymd($this->input->post('tanggal')),
			'tipe'=>$this->input->post('tipe'),
			'kilometer'=>$this->input->post('kilometer')
		);
		return $data;		
	}
	private function _field_servis_detail($r=''){
		$data = array(
			form_dropdown('komponen[]',$this->komponen_mdl->dropdown_komponen(),set_value('komponen[]',(isset($r->komponen)?$r->komponen:'')),'required=required class="form-control input-sm"').
			form_input(array('name'=>'komponen_lain[]','placeholder'=>'Komponen lain','class'=>'form-control input-sm komponen-lain '.(isset($r->komponen_lain) && $r->komponen_lain<>''?'':'hide'),'maxlength'=>'60','autocomplete'=>'off','value'=>set_value('komponen_lain[]',(isset($r->komponen_lain)?$r->komponen_lain:'')))),
			form_dropdown('aksi[]',$this->servis_mdl->dropdown_aksi(),set_value('aksi[]',(isset($r->aksi)?$r->aksi:'')),'required=required class="form-control input-sm"'),
			form_input(array('name'=>'satuan[]','class'=>'form-control input-sm input-uang text-right','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('satuan[]',(isset($r->satuan)?$r->satuan:'')),'required'=>'required')),
			form_input(array('name'=>'harga[]','class'=>'form-control input-sm input-uang text-right','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('harga[]',(isset($r->harga)?$r->harga:'')),'required'=>'required')),
			form_input(array('name'=>'total_harga[]','class'=>'form-control input-sm input-uang text-right','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('total_harga[]',(isset($r->harga) && isset($r->satuan)?$r->harga*$r->satuan:'')),'readonly'=>'readonly')),
			'<a href="javascript:void(0)" class="btn btn-danger btn-sm delete-servis"><span class="glyphicon glyphicon-trash"></span> Delete</a>'
		);
		return $data;
	}
	private function _set_rules(){
		$this->form_validation->set_rules('nomor','Nomor','required|trim');
		$this->form_validation->set_rules('kendaraan','Kendaraan','required|trim');
		$this->form_validation->set_rules('tanggal','Tanggal','required|trim');
		$this->form_validation->set_rules('tipe','Tipe','required|trim');
		$this->form_validation->set_rules('kilometer','Kilometer','required|trim');
	}
	public function add(){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['action'] = 'servis/add'.$this->_filter();
			$xdata['breadcrumb'] = 'servis'.$this->_filter();
			$xdata['heading'] = 'New';
			$xdata['owner'] = '';

			$this->table->set_template(tbl_tmp_servis());
			$this->table->set_heading('Komponen Mesin','Jenis Perlakuan','Satuan','Harga Satuan','Total Harga','Action');
			$this->table->add_row($this->_field_servis_detail());
			$xdata['table'] = $this->table->generate();	

			$data['content'] = $this->load->view('servis_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_create'] = $this->session->userdata('user_login');
			$data['date_create'] = date('Y-m-d H:i:s');
			$id = $this->servis_mdl->add($data);
			$nomor = $this->servis_mdl->get_from_field('id',$id)->row()->nomor;
			$this->_add_servis_detail($nomor);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Tambah Data Sukses</div>');
			redirect('servis/add'.$this->_filter());
		}
	}
	public function edit($id){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['row'] = $this->servis_mdl->get_from_field('id',$id)->row();
			$xdata['action'] = 'servis/edit/'.$id.$this->_filter();
			$xdata['breadcrumb'] = 'servis'.$this->_filter();
			$xdata['heading'] = 'Update';
			$xdata['owner'] = owner($xdata['row']);

			$this->table->set_template(tbl_tmp_servis());
			$this->table->set_heading('Komponen Mesin','Jenis Perlakuan','Satuan','Harga Satuan','Total Harga','Action');
			$nomor = $this->servis_mdl->get_from_field('id',$id)->row()->nomor;
			$servis_detail = $this->general_mdl->get_from_field('servis_detail','servis',$nomor);
			if($servis_detail->num_rows()>0){
				foreach($servis_detail->result() as $r){
					$this->table->add_row($this->_field_servis_detail($r));
				}
			}else{
				$this->table->add_row($this->_field_servis_detail());
			}
			$xdata['table'] = $this->table->generate();	
			$data['content'] = $this->load->view('servis_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_update'] = $this->session->userdata('user_login');
			$data['date_update'] = date('Y-m-d H:i:s');
			$this->servis_mdl->edit($id,$data);
			$nomor = $this->servis_mdl->get_from_field('id',$id)->row()->nomor;
			$this->servis_detail_mdl->delete_from_field('servis',$nomor);
			$this->_add_servis_detail($nomor);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Edit Data Sukses</div>');
			redirect('servis/edit/'.$id.$this->_filter());
		}
	}
	private function _add_servis_detail($id){
		$komponen = $this->input->post('komponen');
		$komponen_lain = $this->input->post('komponen_lain');
		$aksi = $this->input->post('aksi');
		$satuan = $this->input->post('satuan');
		$harga = $this->input->post('harga');
		$i=0;
		foreach($komponen as $r){
			if($r<>''){
				$data = array(
					'servis'=>$id,
					'komponen'=>$r,
					'komponen_lain'=>$komponen_lain[$i],
					'aksi'=>$aksi[$i],
					'satuan'=>str_replace(',', '', $satuan[$i]),
					'harga'=>str_replace(',', '', $harga[$i])
				);
				$this->servis_detail_mdl->add($data);
			}
			$i++;
		}
	}
	public function delete($id=''){
		if($id<>''){
			$this->servis_mdl->delete($id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->servis_mdl->delete($c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">Delete Data Sukses</div>');
		redirect('servis'.$this->_filter());
	}
	public function tambah_servis(){
		$this->load->view('servis_item');
	}
	public function print_detail($id=''){	
		$servis = $this->general_mdl->get_from_field('servis','id',$id)->row();
		$servis_tipe = $this->general_mdl->get_from_field('servis_tipe','kode',$servis->tipe)->row();
		$kendaraan = $this->general_mdl->get_from_field('kendaraan','kode',$servis->kendaraan)->row();
		$kendaraan_tipe = $this->general_mdl->get_from_field('kendaraan_tipe','kode',$kendaraan->tipe)->row();
		require_once "./assets/lib/fpdf/fpdf.php";
		$pdf = new FPDF();
		$pdf->AliasNbPages();
		$pdf->AddPage('P','A4');
		$pdf->Image('./assets/img/logo.jpg', 12, 10, 25, 0);
		$pdf->SetFont('Arial','B',10);
		$pdf->setX(35);
		$pdf->Cell(0,5,'PEMERINTAH DAERAH KABUPATEN CIANJUR',0,0,'C');
		$pdf->Ln(5);
		$pdf->setX(35);
		$pdf->Cell(0,5,'DINAS KEBERSIHAN DAN PERTAMANAN',0,0,'C');
		$pdf->Ln(7);
		$pdf->setX(40);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(20,5,'NOMOR',1,0,'C');
		$pdf->Cell(75,5,$servis->nomor,1,0,'C');
		$pdf->Ln(7);
		$pdf->setX(40);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,10,'KARTU SEHAT KENDARAAN',1,0,'C');
		$pdf->Ln(12);
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(30,5,'NO. MESIN',0,0,'L');
		$pdf->Cell(95,5,': '.$kendaraan->nomes,0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(30,5,'TYPE SERVIS',0,0,'L');
		$pdf->Cell(95,5,': '.$servis_tipe->nama,0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(30,5,'TAHUN ANGGARAN',0,0,'L');
		$pdf->Cell(95,5,': '.date_format(date_create($servis->tanggal),'Y'),0,0,'L');

		$pdf->setXY(140,22);
		$pdf->Cell(30,5,'NO KENDARAAN',1,0,'L');
		$pdf->Cell(0,5,$kendaraan->nopol,1,0,'C');

		$pdf->setXY(140,27);
		$pdf->Cell(30,5,'TIPE KENDARAAN',1,0,'L');
		$pdf->Cell(0,5,$kendaraan_tipe->nama,1,0,'C');

		$pdf->setXY(140,41);
		$pdf->Cell(30,5,'TANGGAL',0,0,'L');
		$pdf->Cell(0,5,': '.date_format(date_create($servis->tanggal),'d'),0,0,'L');

		$pdf->setXY(140,46);
		$pdf->Cell(30,5,'BULAN',0,0,'L');
		$pdf->Cell(0,5,': '.date_format(date_create($servis->tanggal),'M'),0,0,'L');

		$pdf->setXY(140,51);
		$pdf->Cell(30,5,'KILOMETER',0,0,'L');
		$pdf->Cell(0,5,': '.$servis->kilometer,0,0,'L');

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(70,5,'KOMPONEN DASAR MESIN',1,0,'C');
		$pdf->Cell(30,5,'JENIS PERLAKUAN',1,0,'C');
		$pdf->Cell(30,5,'SATUAN',1,0,'C');
		$pdf->Cell(30,5,'HARGA SATUAN',1,0,'C');
		$pdf->Cell(0,5,'TOTAL HARGA',1,0,'C');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',8);
		$result = $this->general_mdl->get_from_field('servis_detail','servis',$servis->nomor)->result();
		$total = 0;
		foreach($result as $r){
			$komponen = $this->general_mdl->get_from_field('komponen','kode',$r->komponen)->row();
			$komponen_satuan = $this->general_mdl->get_from_field('komponen_satuan','kode',$komponen->satuan)->row();
			$aksi = $this->general_mdl->get_from_field('servis_aksi','kode',$r->aksi)->row();
			$pdf->Cell(70,5,$komponen->nama.' '.($r->komponen_lain<>''?':'.$r->komponen_lain:''),1,0,'L');
			$pdf->Cell(30,5,$aksi->nama,1,0,'C');
			$pdf->Cell(30,5,number_format($r->satuan).' '.$komponen_satuan->nama,1,0,'R');
			$pdf->Cell(30,5,number_format($r->harga),1,0,'R');
			$pdf->Cell(0,5,number_format($r->satuan*$r->harga),1,0,'R');
			$pdf->Ln(5);			
			$total += $r->satuan*$r->harga;
		}
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(160,5,'Total',1,0,'L');
		$pdf->Cell(0,5,number_format($total),1,0,'R');
		$pdf->Ln(10);			

		$pdf->Cell(80,5,'',0,0,'C');
		$pdf->Cell(0,5,'Mengetahui,',0,0,'C');
		$pdf->Ln(5);

		$pdf->Cell(80,5,'Penanggung Jawab Bengkel',0,0,'C');
		$pdf->Cell(0,5,'Mandor Armada',0,0,'C');
		$pdf->Ln(5);			
		$pdf->Cell(80,5,'Dinas Kebersihan dan Pertamanan',0,0,'C');
		$pdf->Cell(0,5,'Dinas Kebersihan dan Pertamanan',0,0,'C');
		$pdf->Ln(5);			
		$pdf->Cell(80,5,'Kabupaten Cianjur',0,0,'C');
		$pdf->Cell(0,5,'Kabupaten Cianjur',0,0,'C');
		$pdf->Ln(20);			
		$pdf->SetFont('Arial','BU',8);
		$pdf->Cell(80,5,'Rusdi Hermawan',0,0,'C');
		$pdf->Cell(0,5,'Deden Suparman, SIP',0,0,'C');
		$pdf->Ln(5);			
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(80,5,'NIP. 19610912 200701 1 002',0,0,'C');
		$pdf->Cell(0,5,'NIP. 19710316 200901 1 003',0,0,'C');

		$pdf->Output();		
	}
}