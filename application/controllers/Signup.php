<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Signup_model');
	}

	public function index()
	{
		$this->load->view('signup_view');
	}

	function register() {
        
		$response = $this->Signup_model->insert_data();
        if ($response == true) {
            echo "<script>alert('Your data is saved')</script>";
            redirect('Login');
        } else {
            echo "<script>alert('Sorry there's error somewhere')</script>";
            $this->load->view('signup_view');
        }
        
		
	}
}
