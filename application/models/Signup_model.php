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
        if ($role = 'Admin') {
            $level = '1';
        }elseif ($role = 'Personal') {
            $level = '2';
        }elseif ($role = 'Business') {
            $level = '3';
        }
		
        
		// $response = $this->Signup_model->validate_inputs($username, $password);
        // $data = array(
        //     'full_name' => 'Ojo mary',
        //     'username' => 'ojomary',
        //     'email' => 'ojomary@gmail.com',
        //     'role' => 'Personal',
        //     'level' => '3',
        //     'logged_in' => TRUE
        // );
        $data = array(
            'full_name' => $full_name,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'role' => $role,
            'level' => $level,
        );

        $this->db->insert('users_tbl', $data);
        return ($this->db->affected_rows() != 1) ? false : true; 
    }
}
