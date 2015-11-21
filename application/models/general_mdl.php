<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_mdl extends CI_Model {
	function get_from_field($table_name,$field,$value){
		$this->db->where($field,$value);
		return $this->db->get($table_name);	
	}			
	function get_servis_history($kendaraan_id){
		$this->db->select(array('servis.tanggal','komponen.nama as komponen_nama','servis_detail.komponen_lain','komponen_aksi.nama as komponen_aksi_nama'));
		$this->db->join('servis_detail','servis.id=servis_detail.servis','left');
		$this->db->join('komponen','servis_detail.komponen=komponen.id','left');
		$this->db->join('komponen_aksi','komponen_aksi.id=servis_detail.aksi','left');
		$this->db->where('servis.kendaraan',$kendaraan_id);
		$this->db->order_by('servis.tanggal','desc');
		return $this->db->get('servis');
	}	
}