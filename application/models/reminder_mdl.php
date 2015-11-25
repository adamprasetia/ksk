<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder_mdl extends CI_Model {
	function terakhir_ganti_oli($kendaraan_id){
		$this->db->where('servis.kendaraan',$kendaraan_id);
		$this->db->where('servis_detail.komponen','3');
		$this->db->where('servis_detail.aksi','1');
		$this->db->join('servis_detail','servis.id=servis_detail.servis','left');
		$this->db->order_by('servis.tanggal','desc');
		$this->db->limit(1);
		$result = $this->db->get('servis');
		if($result->num_rows() > 0){
			return timeago(strtotime($result->row()->tanggal));
		}else{
			return "Belum Pernah Ganti Oli";
		}
	}
}