<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anggaran_mdl extends CI_Model {
	private $tbl_name = 'anggaran';
	private $tbl_key = 'id';
	function query(){
		$data[] = $this->db->select(array('anggaran.*','anggaran_tipe.nama as tipe_nama'));
		$data[] = $this->db->join('anggaran_tipe','anggaran.tipe=anggaran_tipe.kode','left');
		$data[] = $this->search();
		$data[] = $this->where('tipe');
		$data[] = $this->db->order_by($this->general_lib->get_order_column(),$this->general_lib->get_order_type());
		$data[] = $this->db->offset($this->general_lib->get_offset());
		return $data;
	}
	function get(){
		$this->query();
		$this->db->limit($this->general_lib->get_limit());
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
	function get_from_field($field,$value){
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
			return $this->db->where('(anggaran.nama like "%'.$result.'%")');
		}		
	}
	function where($field){
		$result = $this->input->get($field);
		if($result <> ''){
			return $this->db->where($field,$result);
		}		
	}
	function dropdown_tipe(){
		$result = $this->db->get('anggaran_tipe')->result();
		$data[''] = '- Tipe -';
		foreach($result as $r){
			$data[$r->kode] = $r->nama;
		}
		return $data;
	}		
}