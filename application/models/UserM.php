<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class UserM extends CI_Model{

		 public function insert_contact($userData)
	    {
	        $this->db->insert('user', $userData);
	        return $this->db->insert_id();
	    }

	}

?>