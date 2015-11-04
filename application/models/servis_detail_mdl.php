<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servis_detail_mdl extends CI_Model {
	private $tbl_name = 'servis_detail';
	private $tbl_key = 'id';
	function add($data){
		$this->db->insert($this->tbl_name,$data);
		return $this->db->insert_id();
	}
	function delete_from_field($field,$value){
		$this->db->where($field,$value);
		return $this->db->delete($this->tbl_name);	
	}
}