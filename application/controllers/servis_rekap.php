<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servis_rekap extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('kendaraan_mdl');
		$this->load->model('servis_rekap_mdl');
	}
	public function index(){
			$offset = $this->general_lib->get_offset();
			$limit = $this->general_lib->get_limit();
			$total = $this->servis_rekap_mdl->count_all();

			$xdata['pdf_btn'] = anchor('servis_rekap/pdf'.$this->_filter(),'Export to Pdf',array('class'=>'btn btn-warning btn-sm','target'=>'_blank'));

			$this->table->set_template(tbl_tmp());
			$head_data = array(
				'tanggal'=>'Tanggal',
				'nopol'=>'Kendaraan',
				'tipe'=>'Tipe',
				'kilometer'=>'Kilometer',
				'komponen_nama'=>'Komponen',
				'komponen_aksi_nama'=>'Jenis Perlakuan',
				'satuan'=>'Satuan',
				'harga'=>'Harga Satuan',
				'total'=>'Total Harga'
			);
			$heading[] = 'No';
			foreach($head_data as $r => $value){
				$heading[] = anchor('servis_rekap'.$this->_filter(array('order_column'=>"$r",'order_type'=>$this->general_lib->order_type($r))),"$value ".$this->general_lib->order_icon("$r"));
			}		
			$this->table->set_heading($heading);
			$result = $this->servis_rekap_mdl->get()->result();
			$i=1;
			foreach($result as $r){
				$this->table->add_row(
					$i++,
					format_dmy($r->tanggal),
					anchor('kendaraan/detail/'.$r->kendaraan_id,$r->nopol,array('target'=>'_blank')),
					$r->tipe,
					$r->kilometer,
					($r->komponen_lain<>''?$r->komponen_lain:$r->komponen_nama),
					$r->komponen_aksi_nama,
					array('data'=>number_format($r->satuan),'align'=>'right'),
					array('data'=>number_format($r->harga),'align'=>'right'),
					array('data'=>number_format($r->total),'align'=>'right')
				);
			}
			$xdata['table'] = $this->table->generate();
			$xdata['total'] = page_total($offset,$limit,$total);
			
			$config = pag_tmp();
			$config['base_url'] = site_url("servis_rekap".$this->_filter());
			$config['total_rows'] = $total;
			$config['per_page'] = $limit;

			$this->pagination->initialize($config); 
			$xdata['pagination'] = $this->pagination->create_links();

			$data['content'] = $this->load->view('servis_rekap',$xdata,true);
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
		$pdf->AddPage('L','A4');
		$pdf->Image('./assets/img/logo.jpg', 10, 10, 15, 0);
		$pdf->SetFont('Arial','B',10);
		$pdf->setX(30);
		$pdf->Cell(0,5,'PEMERINTAH DAERAH KABUPATEN CIANJUR',0,0,'L');
		$pdf->Ln(5);
		$pdf->setX(30);
		$pdf->Cell(0,5,'DINAS KEBERSIHAN DAN PERTAMANAN',0,0,'L');
		$pdf->Ln(5);
		$pdf->setX(30);
		$pdf->Cell(0,5,'Periode : '.$this->input->get('date_from').' s/d '.$this->input->get('date_to'),0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(0,5,'REKAPITULASI SERVIS',0,0,'C');
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(10,5,'NO',1,0,'C');
		$pdf->Cell(20,5,'TANGGAL',1,0,'C');
		$pdf->Cell(20,5,'KENDARAAN',1,0,'C');
		$pdf->Cell(40,5,'TIPE',1,0,'C');
		$pdf->Cell(30,5,'KILOMETER',1,0,'C');
		$pdf->Cell(60,5,'KOMPONEN',1,0,'C');
		$pdf->Cell(20,5,'PERLAKUAN',1,0,'C');
		$pdf->Cell(20,5,'SATUAN',1,0,'C');
		$pdf->Cell(30,5,'HARGA SATUAN',1,0,'C');
		$pdf->Cell(0,5,'TOTAL HARGA',1,0,'C');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',8);
		$result = $this->servis_rekap_mdl->pdf()->result();
		$i=1;
		$total = 0;
		foreach($result as $r){
			$pdf->Cell(10,5,$i++,1,0,'C');
			$pdf->Cell(20,5,format_dmy($r->tanggal),1,0,'C');
			$pdf->Cell(20,5,$r->nopol,1,0,'C');
			$pdf->Cell(40,5,$r->tipe,1,0,'L');
			$pdf->Cell(30,5,$r->kilometer,1,0,'C');
			$pdf->Cell(60,5,($r->komponen_lain<>''?$r->komponen_lain:$r->komponen_nama),1,0,'L');
			$pdf->Cell(20,5,$r->komponen_aksi_nama,1,0,'C');
			$pdf->Cell(20,5,number_format($r->satuan),1,0,'R');
			$pdf->Cell(30,5,number_format($r->harga),1,0,'R');
			$pdf->Cell(0,5,number_format($r->total),1,0,'R');
			$pdf->Ln(5);			
			$total += $r->satuan*$r->harga;
		}
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(250,5,'Total',1,0,'L');
		$pdf->Cell(0,5,number_format($total),1,0,'R');
		$pdf->Ln(10);			

		$pdf->Cell(140,5,'',0,0,'C');
		$pdf->Cell(0,5,'Mengetahui,',0,0,'C');
		$pdf->Ln(5);

		$pdf->Cell(140,5,'Penanggung Jawab Bengkel',0,0,'C');
		$pdf->Cell(0,5,'Mandor Armada',0,0,'C');
		$pdf->Ln(5);			
		$pdf->Cell(140,5,'Dinas Kebersihan dan Pertamanan',0,0,'C');
		$pdf->Cell(0,5,'Dinas Kebersihan dan Pertamanan',0,0,'C');
		$pdf->Ln(5);			
		$pdf->Cell(140,5,'Kabupaten Cianjur',0,0,'C');
		$pdf->Cell(0,5,'Kabupaten Cianjur',0,0,'C');
		$pdf->Ln(20);			
		$pdf->SetFont('Arial','BU',8);
		$pdf->Cell(140,5,'Rusdi Hermawan',0,0,'C');
		$pdf->Cell(0,5,'Deden Suparman, SIP',0,0,'C');
		$pdf->Ln(5);			
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(140,5,'NIP. 19610912 200701 1 002',0,0,'C');
		$pdf->Cell(0,5,'NIP. 19710316 200901 1 003',0,0,'C');		
		$pdf->Output();		
	}
}