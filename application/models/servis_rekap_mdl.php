<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servis_rekap_mdl extends CI_Model {
	private $tbl_name = 'servis';
	function query(){
		$data[] = $this->db->select(array(
			'servis.tanggal',
			'kendaraan.nopol',
			'kendaraan.id as kendaraan_id',
			'servis_tipe.nama as tipe',
			'servis.kilometer',
			'komponen.nama as komponen_nama',
			'komponen_satuan.nama as komponen_satuan_nama',
			'servis_detail.komponen_lain',
			'servis_detail.satuan',
			'servis_detail.harga',
			'(servis_detail.satuan*servis_detail.harga) as total',
			'komponen_aksi.nama as komponen_aksi_nama')
		);
		$data[] = $this->db->join('kendaraan','kendaraan.id=servis.kendaraan','left');
		$data[] = $this->db->join('servis_tipe','servis.tipe=servis_tipe.id','left');
		$data[] = $this->db->join('servis_detail','servis.id=servis_detail.servis','left');
		$data[] = $this->db->join('komponen','servis_detail.komponen=komponen.id','left');
		$data[] = $this->db->join('komponen_aksi','komponen_aksi.id=servis_detail.aksi','left');
		$data[] = $this->db->join('komponen_satuan','komponen_satuan.id=komponen.satuan','left');
		$data[] = $this->where('kendaraan');
		$data[] = $this->where_date('date','tanggal');
		$data[] = $this->db->order_by($this->general_lib->get_order_column('servis.tanggal'),$this->general_lib->get_order_type('desc'));
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
}