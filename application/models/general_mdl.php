<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_mdl extends CI_Model {
	function get_from_field($table_name,$field,$value){
		$this->db->where($field,$value);
		return $this->db->get($table_name);	
	}			
	function get_servis_history($kendaraan_id){
		$this->db->select(array(
			'servis.tanggal',
			'komponen.nama as komponen_nama',
			'servis_detail.komponen_lain',
			'servis_aksi.nama as servis_aksi_nama'
		));
		$this->db->join('servis_detail','servis.nomor=servis_detail.servis','left');
		$this->db->join('komponen','servis_detail.komponen=komponen.kode','left');
		$this->db->join('servis_aksi','servis_aksi.kode=servis_detail.aksi','left');
		$this->db->where('servis.kendaraan',$kendaraan_id);
		$this->db->order_by('servis.tanggal','desc');
		return $this->db->get('servis');
	}	
}