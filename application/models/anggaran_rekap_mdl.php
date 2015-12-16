<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggaran_rekap_mdl extends CI_Model {
	private $tbl_name = 'servis';
	function query(){
		$data[] = $this->db->select(array(
			'servis.tanggal',
			'date_format(servis.tanggal,\'%M %Y\') as bulan',
			'sum(servis_detail.satuan*servis_detail.harga) as total')
		);
		$data[] = $this->db->join('servis_detail','servis_detail.servis=servis.nomor','left');
		$data[] = $this->where_date('date','tanggal');
		$data[] = $this->db->group_by('month(tanggal)');
		$data[] = $this->db->order_by('tanggal','asc');
		$data[] = $this->db->offset($this->general_lib->get_offset());
		return $data;
	}
	function get(){
		$this->query();
		$this->db->limit($this->general_lib->get_limit());
		return $this->db->get($this->tbl_name);
	}
	function pdf(){
		$this->query();
		return $this->db->get($this->tbl_name);
	}
	function count_all(){
		$this->query();
		return $this->db->get($this->tbl_name)->num_rows();
	}	
	function where($field){
		$result = $this->input->get($field);
		if($result <> ''){
			return $this->db->where($field,$result);
		}		
	}	
	function where_date($input,$field){
		$from = $this->input->get($input.'_from');
		$to = $this->input->get($input.'_to');
		if($from <> '' && $to <> ''){
			$data[] = $this->db->where($field.' >=',format_ymd($from));
			$data[] = $this->db->where($field.' <=',format_ymd($to));
		}		
	}	
	function get_anggaran_awal($date){
		$this->db->select(array('sum(jumlah) as total'));
		$this->db->where('tanggal < ',$date);
		return $this->db->get('anggaran')->row()->total;		
	}
	function get_pengeluaran_awal($date){
		$this->db->select(array(
			'sum(servis_detail.satuan*servis_detail.harga) as total')
		);
		$this->db->join('servis_detail','servis_detail.servis=servis.nomor','left');
		$this->db->where('tanggal < ',$date);
		return $this->db->get('servis')->row()->total;
	}	
}