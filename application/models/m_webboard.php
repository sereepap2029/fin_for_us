<?php
class M_webboard extends CI_Model {
 
  public function __construct() {
        parent::__construct();
        $this->load->model("m_stringlib");
    }
    
    function generate_id() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('topic_room', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }

	function get_all_room($page="no"){
		$this->db->order_by("room_name", "asc"); 
		if ($page!="no") {
			$this->db->limit(10, $page);
		}		
		$query = $this->db->get('topic_room');
		$query->count_all=$this->db->count_all_results('topic_room');
		return $query;
	}

	function get_room_by_id($username){
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
	function add_room ($data) {
		$this->db->insert('topic_room', $data);
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