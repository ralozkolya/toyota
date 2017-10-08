<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $data = array(
		'title' => 'Admin panel - Toyota',
		ERROR_MESSAGE => NULL
	);

	public function __construct()
	{
		parent::__construct();

		$this->load->library('Auth_l');
		$this->load->language('admin');
	}

	public function login()
	{
		if($this->auth_l->is_logged_in()) {
			redirect(base_url().'admin');
			exit();
		}

		if($this->input->post()) {

			$username = $this->input->post(USERNAME);
			$password = $this->input->post(PASSWORD);

			if($this->auth_l->login($username, $password)) {
				redirect(base_url().'admin');
			}

			else {
				$this->data[ERROR_MESSAGE] = $this->lang->line('login_failed');
			}
		}

		$this->load->view('pages/admin/login', $this->data);
	}

	public function logout() {
		$this->auth_l->logout();
		redirect(base_url().'auth/login');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */