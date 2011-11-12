<?php

class Statistics_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function get_numOfStudentsPerCourse($uni_id) {
		$query = $this->db->query('SELECT COUNT( DISTINCT (u.uid)) AS num, m.name AS name
									FROM module AS m
									LEFT JOIN code AS c ON m.mid = c.mid
									LEFT JOIN usercode AS uc ON uc.cid = c.cid
									LEFT JOIN user AS u ON u.uid = uc.uid
									WHERE u.unid = 
									 '.$uni_id);
		return $query->result();
	}
	
		
	function get_percOfAttenPerModule() {
		$query = $this->db->query('SELECT m.name AS name, COUNT( DISTINCT (c.cid))  * COUNT( DISTINCT (uc.uid))  DIV COUNT(uc.cid) AS num
                                    FROM code AS c

									LEFT JOIN module AS m ON c.mid = m.mid
									LEFT JOIN usercode AS uc ON c.cid = uc.cid
									LEFT JOIN user AS u ON u.uid = uc.uid);
									return $query->result();');
		return $query->result();
	}
	
                                  
	
	
}