<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_mdl extends CI_Model {
	private $tbl_name;
	private $tbl_key = 'id';
	function __construct(){
		$this->tbl_name = $this->uri->segment(2);
	}
	function query(){
		$data[] = $this->search();
		$data[] = $this->db->order_by($this->general_lib->get_order_column(),$this->general_lib->get_order_type());
		$data[] = $this->db->offset($this->general_lib->get_offset());
		return $data;
	}
	function get(){
		$this->query();
		$this->db->limit($this->general_lib->get_limit());
		return $this->db->get($this->tbl_name);
	}
	function get_all(){
		$this->query();
		return $this->db->get($this->tbl_name);
	}
	function add($data){
		$this->db->insert($this->tbl_name,$data);
	}
	function edit($id,$data){
		$this->db->where($this->tbl_key,$id);
		$this->db->update($this->tbl_name,$data);
	}
	function delete($id){
		$this->db->where($this->tbl_key,$id);
		$this->db->delete($this->tbl_name);
	}
	function get_from_field($field,$value,$param=0){
		if($param==1){$this->query();}
		$this->db->where($field,$value);
		return $this->db->get($this->tbl_name);	
	}
	function count_all(){
		$this->query();
		return $this->db->get($this->tbl_name)->num_rows();
	}
	function search(){
		$result = $this->input->get('search');
		if($result <> ''){
			return $this->db->where('(kode like "%'.$result.'%" or nama like "%'.$result.'%")');
		}		
	}		
	function dropdown(){
		$result = $this->db->get($this->tbl_name)->result();
		$data[''] = '- Tipe -';
		foreach($result as $r){
			$data[$r->kode] = $r->nama;
		}
		return $data;
	}		
}