
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_mdl extends CI_Model {
	private $tbl_name = 'user';
	private $tbl_key = 'id';
	function get(){
		$this->db->select(array('user.*','user_level.name as level_name','user_status.name as status_name'));
		$this->db->order_by($this->general_lib->get_order_column(),$this->general_lib->get_order_type());
		$this->db->offset($this->general_lib->get_offset());
		$this->db->limit($this->general_lib->get_limit());
		$this->db->join('user_level','user.level=user_level.id','left');
		$this->db->join('user_status','user.status=user_status.id','left');
		$this->search();
		$this->where('level');
		$this->where('status');
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
		return $this->db->count_all_results($this->tbl_name);
	}
	function search(){
		$result = $this->input->get('search');
		if($result <> ''){
			return $this->db->where('(fullname like "%'.$result.'%" or username like "%'.$result.'%")');
		}		
	}
	function where($field){
		$result = $this->input->get($field);
		if($result <> ''){
			return $this->db->where($field,$result);
		}		
	}
	function user_level_dropdown(){
		$result = $this->db->get('user_level')->result();
		$data[''] = '- Level -';
		foreach($result as $r){
			$data[$r->id] = $r->name;
		}
		return $data;
	}	
	function user_status_dropdown(){
		$result = $this->db->get('user_status')->result();
		$data[''] = '- Status -';
		foreach($result as $r){
			$data[$r->id] = $r->name;
		}
		return $data;
	}	
}