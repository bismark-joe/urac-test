<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model { #this is what handle the data structure as regard accessing login detail
    function verify_user($username, $password) { #the rquirement to verify a user is their username and password
        $this->db->select('*'); #Selecting all from database
        $this->db->from('users_tbl'); #users_tbl is th name of the table in the database where username and password are saved
        $this->db->where('username', $username); #serching through the username column to find match with the supplied username
        $this->db->where('password', md5($password)); # #serching through the password column to find match with the supplied password
        $query = $this->db->get(); #fetching response/data from the database.
        return $query;
    }
	
}
