<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	function auth() {
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$response = $this->Login_model->verify_user($username, $password);

		if ($response->num_rows() > 0) {
			
			$data = $response->row_array();
			$full_name = $data['full_name'];
			$username = $data['username'];
			$email = $data['email'];
			$role = $data['role'];
			$level = $data['level'];

			$sessdata = array(
				'full_name' => $full_name,
				'username' => $username,
				'email' => $email,
				'role' => $role,
				'level' => $level,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sessdata);
			if ($level === "1") {
				redirect('Admin');
			} elseif ($level === "2"){
				redirect('Business');
			}else {
				redirect('Personal');
			}
		}else {
			echo "<script>alert('Access denied! Wrong input');history.go(-1)</script>";
		}
		$this->load->view('login_view');
	}
}
