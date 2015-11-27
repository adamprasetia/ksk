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
			'servis_aksi.nama as servis_aksi_nama')
		);
		$data[] = $this->db->join('kendaraan','kendaraan.kode=servis.kendaraan','left');
		$data[] = $this->db->join('servis_tipe','servis_tipe.kode=servis.tipe','left');
		$data[] = $this->db->join('servis_detail','servis_detail.servis=servis.nomor','left');
		$data[] = $this->db->join('komponen','servis_detail.komponen=komponen.kode','left');
		$data[] = $this->db->join('servis_aksi','servis_aksi.kode=servis_detail.aksi','left');
		$data[] = $this->db->join('komponen_satuan','komponen_satuan.kode=komponen.satuan','left');
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