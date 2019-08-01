<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
	}

	public function index() {
		$message = $this->session->flashdata('message');

		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));

		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username tidak boleh kosong'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong'));

		if ($this->form_validation->run() == FALSE){
			if (empty(validation_errors())){
				$message = '';
			} else {
				$message = '<div class="alert alert-warning"><strong>Gagal!</strong> '.validation_errors().'</div>';
			}
			
		} else {
			$query = "SELECT * from t_admin where id_admin = '".$username."'";

			$data = $this->db->query($query);

			if ($data->num_rows() > 0){
				foreach ($data->result() as $row) {
					if ($row->password == md5($password)){
						$userSession = array(
							'username' 		=> $row->id_admin,
							'name' 			=> $row->nama_admin,
							'image'			=> NULL,
							'isLogin' 		=> TRUE,
						);

						$this->session->set_userdata($userSession);

						$message = '<div class="alert alert-success"><strong>Sukses!</strong> Anda berhasil Login</div>';
						$view['message'] = $message;
						$this->session->set_flashdata('message', $message);
						echo '<meta http-equiv="refresh" content="1;url='.base_url().'member/view" />';
					} else {
						$message = '<div class="alert alert-warning"><strong>Gagal!</strong> Password Salah</div>';
					}
				}
			} else {
				$message = '<div class="alert alert-danger"><strong>Gagal!</strong> Akun tidak tersedia</div>';
			}
		}
		$view['message'] = $message;
		$this->session->set_flashdata('message', $message);
		
		
		$this->load->view('login', $view);
	}

	public function logout() {
		$message = '';		
		$message = $this->session->flashdata('message');

		$userSession = array(
			'username' 		=> NULL,
			'name' 			=> NULL,
			'image'			=> NULL,
			'isLogin' 		=> FALSE,
		);

		$this->session->unset_userdata($userSession);
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', $message);
		redirect(base_url().'login');
	}
}
