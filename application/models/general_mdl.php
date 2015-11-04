<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_mdl extends CI_Model {
	private $tbl_name = 'servis_detail';
	private $tbl_key = 'id';
	function get_from_field($table_name,$field,$value){
		$this->db->where($field,$value);
		return $this->db->get($table_name);	
	}			
}