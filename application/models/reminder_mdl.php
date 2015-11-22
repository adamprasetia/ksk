<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reminder_mdl extends CI_Model {
	function oli_mesin($kendaraan_id=''){
		$sql = 'select * from (select kendaraan.id as kendaraan_id,kendaraan.nopol,servis.tanggal from servis left join servis_detail on servis.id = servis_detail.servis left join kendaraan on kendaraan.id = servis.kendaraan where servis_detail.komponen = 3 '.($kendaraan_id<>''?'and kendaraan.id = '.$kendaraan_id:'').' and servis_detail.aksi = 1 order by tanggal desc) as ss group by kendaraan_id';
		return $this->db->query($sql);
	}		
}