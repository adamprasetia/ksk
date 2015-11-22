<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder_mdl extends CI_Model {
	function olie(){
		$sql = 'select * from (select kendaraan.id as kendaraan_id,kendaraan.nopol,servis.tanggal from servis left join servis_detail on servis.id = servis_detail.servis left join kendaraan on kendaraan.id = servis.kendaraan where servis_detail.komponen = 3 and servis_detail.aksi = 1 order by tanggal desc) as ss group by kendaraan_id';
		/*$this->db->select(array(
			'kendaraan.id as kendaraan_id',
			'kendaraan.nopol',
			'servis.tanggal'
		));*/
		//$this->db->join('kendaraan','servis.kendaraan=kendaraan.id','left');
		//$this->db->where('servis_detail.komponen','3');
		//$this->db->where('servis_detail.aksi','1');
		//$this->db->order_by('tanggal','desc');
		//$this->db->group_by('kendaraan');
		//return $this->db->get('(select * from servis left join servis_detail on servis.id = servis_detail.servis order by tanggal desc) as servis');
		return $this->db->query($sql);
	}		
}