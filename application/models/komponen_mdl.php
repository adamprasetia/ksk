<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komponen_mdl extends CI_Model {
	private $tbl_name = 'komponen';
	private $tbl_key = 'id';
	function query(){
		$data[] = $this->db->select(array('komponen.*','komponen_group.nama as group_nama','komponen_satuan.nama as satuan_nama'));
		$data[] = $this->db->join('komponen_group','komponen.group=komponen_group.kode','left');
		$data[] = $this->db->join('komponen_satuan','komponen.satuan=komponen_satuan.kode','left');
		$data[] = $this->search();
		$data[] = $this->where('group');
		$data[] = $this->where('satuan');
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
			return $this->db->where('(komponen.nama like "%'.$result.'%")');
		}		
	}
	function where($field){
		$result = $this->input->get($field);
		if($result <> ''){
			return $this->db->where($field,$result);
		}		
	}
	function get_dropdown_komponen($group){
		$this->db->where('group',$group);
		$result = $this->db->get('komponen')->result();
		foreach($result as $r){
			$data[$r->kode] = $r->nama;
		}
		return $data;
	}
	function dropdown_komponen(){
		$this->db->select(array('komponen.group as `group`','komponen_group.nama as group_nama'));
		$this->db->group_by('group');
		$this->db->join('komponen_group','komponen.group=komponen_group.kode','left');
		$result = $this->db->get('komponen')->result();
		$data[''] = '- Komponen -';
		foreach($result as $r){
			$data[$r->group_nama] = $this->get_dropdown_komponen($r->group);
		}
		return $data;
	}
	function dropdown(){
		$result = $this->db->get($this->tbl_name)->result();
		$data[''] = '- Komponen -';
		foreach($result as $r){
			$data[$r->kode] = $r->nama;
		}
		return $data;
	}		
	function dropdown_group(){
		$result = $this->db->get('komponen_group')->result();
		$data[''] = '- Group -';
		foreach($result as $r){
			$data[$r->kode] = $r->nama;
		}
		return $data;
	}		
	function dropdown_satuan(){
		$result = $this->db->get('komponen_satuan')->result();
		$data[''] = '- Satuan -';
		foreach($result as $r){
			$data[$r->kode] = $r->nama;
		}
		return $data;
	}		

}