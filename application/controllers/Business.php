<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in'!== TRUE)) {
            redirect('Login');
        }
    }

    function index() {
        if ($this->session->userdata('role')=== '2') {
            $data = $this->session->userdata();
            $this->load->view('business_view', $data);
        } else {
            echo "Access Denied!";
        }
    }
}

?>