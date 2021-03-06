<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kendaraan_mdl extends CI_Model {
	private $tbl_name = 'kendaraan';
	private $tbl_key = 'id';
	function query(){
		$data[] = $this->db->select(array(
			'kendaraan.*',
			'kendaraan_tipe.nama as tipe_nama',
			'kendaraan_status.kode as status_kode',
			'kendaraan_status.nama as status_nama'
		));
		$data[] = $this->db->join('kendaraan_tipe','kendaraan.tipe=kendaraan_tipe.kode','left');
		$data[] = $this->db->join('kendaraan_status','kendaraan.status=kendaraan_status.kode','left');
		$data[] = $this->search();
		$data[] = $this->where('tipe');
		$data[] = $this->where('status');
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
			return $this->db->where('(kode like "%'.$result.'%" or nopol like "%'.$result.'%" or nomes like "%'.$result.'%" or nocha like "%'.$result.'%")');
		}		
	}
	function where($field){
		$result = $this->input->get($field);
		if($result <> ''){
			return $this->db->where($field,$result);
		}		
	}
	function dropdown(){
		$result = $this->db->get($this->tbl_name)->result();
		$data[''] = '- Kendaraan -';
		foreach($result as $r){
			$data[$r->kode] = $r->nopol;
		}
		return $data;
	}	
	function dropdown_tipe(){
		$result = $this->db->get('kendaraan_tipe')->result();
		$data[''] = '- Tipe -';
		foreach($result as $r){
			$data[$r->kode] = $r->nama;
		}
		return $data;
	}	
	function dropdown_status(){
		$result = $this->db->get('kendaraan_status')->result();
		$data[''] = '- Status -';
		foreach($result as $r){
			$data[$r->kode] = $r->nama;
		}
		return $data;
	}	
}