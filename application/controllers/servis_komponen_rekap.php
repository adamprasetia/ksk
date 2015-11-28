<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servis_komponen_rekap extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('kendaraan_mdl');
		$this->load->model('servis_komponen_rekap_mdl');
	}
	public function index(){
			$offset = $this->general_lib->get_offset();
			$limit = $this->general_lib->get_limit();
			$total = $this->servis_komponen_rekap_mdl->count_all();

			$xdata['pdf_btn'] = anchor('servis_komponen_rekap/pdf'.$this->_filter(),'<span class="glyphicon glyphicon-export"></span> Export to Pdf',array('class'=>'btn btn-success btn-sm','target'=>'_blank'));

			$this->table->set_template(tbl_tmp());
			$head_data = array(
				'komponen_nama'=>'Komponen',
				'satuan'=>'Satuan',
				'total'=>'Total Harga'
			);
			$heading[] = 'No';
			foreach($head_data as $r => $value){
				$heading[] = anchor('servis_komponen_rekap'.$this->_filter(array('order_column'=>"$r",'order_type'=>$this->general_lib->order_type($r))),"$value ".$this->general_lib->order_icon("$r"));
			}		
			$this->table->set_heading($heading);
			$result = $this->servis_komponen_rekap_mdl->get()->result();
			$i=1;
			foreach($result as $r){
				$this->table->add_row(
					$i++,
					($r->komponen_lain<>''?$r->komponen_lain:$r->komponen_nama),
					array('data'=>number_format($r->satuan).'&nbsp;'.$r->komponen_satuan_nama,'align'=>'right'),
					array('data'=>number_format($r->total),'align'=>'right')
				);
			}
			$xdata['table'] = $this->table->generate();
			$xdata['total'] = page_total($offset,$limit,$total);
			
			$config = pag_tmp();
			$config['base_url'] = site_url("servis_komponen_rekap".$this->_filter());
			$config['total_rows'] = $total;
			$config['per_page'] = $limit;

			$this->pagination->initialize($config); 
			$xdata['pagination'] = $this->pagination->create_links();

			$data['content'] = $this->load->view('servis_komponen_rekap',$xdata,true);
			$this->load->view('template',$data);
	}
	public function _filter($add = array()){
		$str = '?avenger=1';
		$data = array('order_column'=>0,'order_type'=>0,'limit'=>0,'offset'=>0,'search'=>0,'kendaraan'=>0,'date_from'=>0,'date_to'=>0);
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
	public function pdf(){
		require_once "./assets/lib/fpdf/fpdf.php";
		$pdf = new FPDF();
		$pdf->AliasNbPages();
		$pdf->AddPage('P','A4');
		$pdf->Image('./assets/img/logo.jpg', 10, 10, 15, 0);
		$pdf->SetFont('Arial','B',10);
		$pdf->setX(30);
		$pdf->Cell(0,5,'PEMERINTAH DAERAH KABUPATEN CIANJUR',0,0,'L');
		$pdf->Ln(5);
		$pdf->setX(30);
		$pdf->Cell(0,5,'DINAS KEBERSIHAN DAN PERTAMANAN',0,0,'L');
		$pdf->SetFont('Arial','',8);
		if($this->input->get('date_from')<>'' && $this->input->get('date_to')<>''){
			$pdf->Ln(5);
			$pdf->setX(30);
			$pdf->Cell(0,5,'Periode : '.$this->input->get('date_from').' s/d '.$this->input->get('date_to'),0,0,'L');
		}
		if($this->input->get('kendaraan')<>''){
			$pdf->Ln(5);
			$pdf->setX(30);
			$pdf->Cell(0,5,'Nomor Polisi : '.$this->general_mdl->get_from_field('kendaraan','kode',$this->input->get('kendaraan'))->row()->nopol,0,0,'L');
		}
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(0,5,'REKAPITULASI SERVIS KOMPONEN',0,0,'C');
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(10,5,'NO',1,0,'C');
		$pdf->Cell(110,5,'KOMPONEN',1,0,'C');
		$pdf->Cell(30,5,'SATUAN',1,0,'C');
		$pdf->Cell(0,5,'TOTAL HARGA',1,0,'C');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',8);
		$result = $this->servis_komponen_rekap_mdl->pdf()->result();
		$i=1;
		$total = 0;
		foreach($result as $r){
			$pdf->Cell(10,5,$i++,1,0,'C');
			$pdf->Cell(110,5,($r->komponen_lain<>''?$r->komponen_lain:$r->komponen_nama),1,0,'L');
			$pdf->Cell(30,5,number_format($r->satuan).' '.$r->komponen_satuan_nama,1,0,'R');
			$pdf->Cell(0,5,number_format($r->total),1,0,'R');
			$pdf->Ln(5);			
			$total += $r->total;
		}
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(150,5,'Total',1,0,'L');
		$pdf->Cell(0,5,number_format($total),1,0,'R');
		$pdf->Ln(10);			

		$pdf->Cell(100,5,'',0,0,'C');
		$pdf->Cell(0,5,'Mengetahui,',0,0,'C');
		$pdf->Ln(5);

		$pdf->Cell(100,5,'Pengelola Teknis Pemeliharaan',0,0,'C');
		$pdf->Cell(0,5,'Pengendali Teknis Pemeliharaan',0,0,'C');
		$pdf->Ln(5);			
		$pdf->Cell(100,5,'Kasi Pengangkutan Sampah',0,0,'C');
		$pdf->Cell(0,5,'Kepala Bidang',0,0,'C');
		$pdf->Ln(5);			
		$pdf->Cell(100,5,'',0,0,'C');
		$pdf->Cell(0,5,'Kebersihan Jalan dan Lingkungan',0,0,'C');
		$pdf->Ln(5);			
		$pdf->Cell(100,5,'Dinas Kebersihan dan Pertamanan',0,0,'C');
		$pdf->Cell(0,5,'Dinas Kebersihan dan Pertamanan',0,0,'C');
		$pdf->Ln(5);			
		$pdf->Cell(100,5,'Kabupaten Cianjur',0,0,'C');
		$pdf->Cell(0,5,'Kabupaten Cianjur',0,0,'C');
		$pdf->Ln(20);			
		$pdf->SetFont('Arial','BU',8);
		$pdf->Cell(100,5,'Azani Anthonida, SP',0,0,'C');
		$pdf->Cell(0,5,'Pratama Nugraha E, SH, MSi',0,0,'C');
		$pdf->Ln(5);			
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(100,5,'NIP. 19700606 200312 1 007',0,0,'C');
		$pdf->Cell(0,5,'NIP. 19690304 199503 1 007',0,0,'C');		
		$pdf->Output();		
	}
}