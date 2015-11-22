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
		$result = $this->reminder_mdl->olie()->result();
		$i=1;
		foreach($result as $r){
			$this->table->add_row(
				$i++,
				anchor('kendaraan/detail/'.$r->kendaraan_id,$r->nopol,array('target'=>'_blank')),
				timeago(strtotime($r->tanggal)),
				olie_mesin_status(timeago(strtotime($r->tanggal)))
			);
		}
		$xdata['reminder_kendaraan'] = $this->table->generate();
		$data['content'] = $this->load->view('home',$xdata,true);
		$this->load->view('template',$data);
	}
	public function tes(){
		$res = $this->reminder_mdl->olie()->result();
		echo "<pre>";
		print_r($res);
	}
}
