<?php
class M_admin extends CI_Model {
 
  public function __construct(){
    parent::__construct();
  		$this->load->model("m_stringlib");  		
	}	

	function get_all_admin($page="no"){
		$this->db->order_by("username", "desc"); 
		if ($page!="no") {
			$this->db->limit(10, $page);
		}		
		$query = $this->db->get('admin_user');
		$query->count_all=$this->db->count_all_results('admin_user');
		return $query;
	}

	function get_admin_by_username($username){
		$admin = new stdClass();
		$this->db->where('username', $username);
		$query = $this->db->get('admin_user');
		
		if ($query->num_rows() > 0) {
			$admin = $query->result();
			$admin = $admin[0];
		}
		return $admin;
	}
	function get_admin($username,$password){
		$admin = new stdClass();
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('admin_user');
		
		if ($query->num_rows() > 0) {
			$admin = $query->result();
			$admin = $admin[0];
		}
		return $admin;
	}
	function delete_admin ($username) {
		$this->db->where('username', $username);
		$this->db->delete('admin_user');
	}
	function add_admin ($data) {
		$this->db->insert('admin_user', $data);
	}
	function update_admin($data, $username) {
		$this->db->where('username', $username);
		$this->db->update('admin_user', $data);
	}
	function check_admin_username($username)
	{
		$isuniq    = FALSE;
			$query = $this->db->get_where('admin_user', array('username' => $username));
			if ($query->num_rows() == 0)
			{
				$isuniq    = TRUE;
			}
	
		return $isuniq;
	}
}