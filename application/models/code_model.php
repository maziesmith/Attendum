<?php

class Code_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function get_codes() {
		$query = $this->db->get('code');
		
		return $query->result();
	}
	
	function query_codes($q) {
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function insert_code($data) {
		return $this->db->insert('code', $data);
	}
}