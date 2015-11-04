<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servis_mdl extends CI_Model {
	private $tbl_name = 'servis';
	private $tbl_key = 'id';
	function query(){
		$data[] = $this->db->select(array('servis.*',
			'servis_tipe.nama as tipe_nama',
			'kendaraan.nopol as nopol',
			'count(servis_detail.id) as jumlah_satuan',
			'sum(servis_detail.satuan*servis_detail.harga) as total_harga'
		));
		$data[] = $this->db->join('servis_tipe','servis.tipe=servis_tipe.id','left');
		$data[] = $this->db->join('kendaraan','servis.kendaraan=kendaraan.id','left');
		$data[] = $this->db->join('servis_detail','servis.id=servis_detail.servis','left');
		$data[] = $this->search();
		$data[] = $this->where('servis.tipe','tipe');
		$data[] = $this->where('kendaraan');
		$data[] = $this->db->group_by('servis.id');
		$data[] = $this->db->order_by($this->general_lib->get_order_column(),$this->general_lib->get_order_type());
		$data[] = $this->db->offset($this->general_lib->get_offset());
		return $data;
	}
	function get(){
		$this->query();
		$this->db->limit($this->general_lib->get_limit());
		return $this->db->get($this->tbl_name);		
	}
	function export(){
		$this->query();
		return $this->db->get($this->tbl_name);		
	}
	function add($data){
		$this->db->insert($this->tbl_name,$data);
		return $this->db->insert_id();
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
			return $this->db->where('(nomor like "%'.$result.'%" or nopol like "%'.$result.'%")');
		}		
	}
	function where($field,$key=''){
		$result = $this->input->get(($key<>''?$key:$field));;
		if($result <> ''){
			return $this->db->where($field,$result);
		}		
	}
	function servis_tipe_dropdown(){
		$result = $this->db->get('servis_tipe')->result();
		$data[''] = '- Tipe -';
		foreach($result as $r){
			$data[$r->id] = $r->nama;
		}
		return $data;
	}			
}