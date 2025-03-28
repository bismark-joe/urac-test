<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model { #this is what handle the data structure as regard accessing signup detail
    function validate_input($username, $password, $all) { #the rquirement to verify a user is their username and password
        // process the data for validation
        // return validated data
    }
	
    function insert_data() {
        $full_name = $this->input->post('full_name', TRUE);
		$username =  $this->input->post('username', TRUE);
		$password =  md5($this->input->post('password', TRUE));
		$email =     $this->input->post('email', TRUE);
		$role =      $this->input->post('role', TRUE);
       
		
        $data = array(
            'full_name' => $full_name,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'role' => $role,
        );

        $this->db->insert('users_tbl', $data);
        return ($this->db->affected_rows() != 1) ? false : true; 
    }
}
