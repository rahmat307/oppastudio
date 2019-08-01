<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index() {
		$this->load->view('welcome_message');
	}

	public function view() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$message = $this->session->flashdata('message');

		$view['page_content'] = 'userview';
		$view['activeMenu'] = 'admin';
		$view['message'] = $message;
		$this->session->set_flashdata('message', $message);

		$this->load->view('template', $view);
	}

	public function add() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$message = $this->session->flashdata('message');

		$username = $this->input->post('username');
		$nama_user = $this->input->post('nama_user');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');


		$view['page_content'] = 'useradd';
		$view['activeMenu'] = 'admin';

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[8]|is_unique[t_admin.id_admin]', array('required' => 'Username tidak boleh kosong'));
		$this->form_validation->set_rules('nama_user', 'Nama Admin', 'trim|required|min_length[3]|alpha_numeric_spaces', array('required' => 'Nama Admin tidak boleh kosong'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|alpha_numeric', array('required' => 'Password tidak boleh kosong'));
		$this->form_validation->set_rules('repassword', 'Ulangi Password', 'trim|required|min_length[6]|alpha_numeric|matches[password]', array('required' => 'Retype Password tidak boleh kosong'));

		if ($this->form_validation->run() == FALSE){

		} else {
			$hash = md5($password);
			$query = "INSERT INTO `t_admin`(`id_admin`, `nama_admin`, `password`) VALUES ('$username','$nama_user', '$hash')";

			$data = $this->db->query($query);
			$check_add = $this->db->affected_rows();

			if ($check_add == TRUE){
				$message = '<div class="alert alert-success"><strong>Sukses!</strong> Data Admin berhasil ditambahkan</div>';
				$view['message'] = $message;
				$this->session->set_flashdata('message', $message);
				redirect(base_url().'user/view');
			} else {
				
			}
		}

		$this->load->view('template', $view);
	}

	public function edit($id='') {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$message = $this->session->flashdata('message');

		$username = $this->input->post('username');
		$nama_user = $this->input->post('nama_user');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');

		$query = "SELECT * from t_admin where id_admin = '$id'";

		$data = $this->db->query($query);

		if ($data->num_rows() > 0){
			foreach ($data->result() as $row) {
				$view['username'] = $row->id_admin;
				$view['nama_user'] = $row->nama_admin;
			}
		}


		$view['page_content'] = 'useredit';
		$view['activeMenu'] = 'admin';

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[8]', array('required' => 'Username tidak boleh kosong'));
		$this->form_validation->set_rules('nama_user', 'Nama Admin', 'trim|required|min_length[3]|alpha_numeric_spaces', array('required' => 'Nama Admin tidak boleh kosong'));
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|alpha_numeric', array('required' => 'Password tidak boleh kosong'));
		$this->form_validation->set_rules('repassword', 'Ulangi Password', 'trim|min_length[6]|alpha_numeric|matches[password]', array('required' => 'Retype Password tidak boleh kosong'));

		if ($this->form_validation->run() == FALSE){

		} else {
			// $query = "INSERT INTO `t_admin`(`id_admin`, `nama_admin`, `password`) VALUES ('$username','$nama_user',md5($password))";

			// $data = $this->db->query($query);
			// $check_add = $this->db->affected_rows();

			// if ($check_add == TRUE){
			// 	$message = '<div class="alert alert-success"><strong>Sukses!</strong> Data User berhasil ditambahkan</div>';
			// 	$view['message'] = $message;
			// 	$this->session->set_flashdata('message', $message);
			// 	redirect(base_url().'user/view');
			// } else {
				
			// }
		}

		$this->load->view('template', $view);
	}

	public function delete() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$message = '';
		$id_admin = $this->input->post('id');
		$query = "DELETE FROM `t_admin` WHERE id_admin = '$id_admin'";

		$data = $this->db->query($query);

		if ($data){
			$message = '<div class="alert alert-success"><strong>Sukses!</strong> Data Admin berhasil dihapus</div>';
			$view['message'] = $message;
			$this->session->set_flashdata('message', $message);
		} else {
			$message = '';
		}

		header('Content-Type: application/json');
		echo json_encode($message, JSON_UNESCAPED_SLASHES);
		return;
	}

	public function list_admin() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$result = array();
		$query = "SELECT * FROM t_admin order by id_admin DESC";

		$data = $this->db->query($query);

		if ($data->num_rows() > 0){
			$no = 1;
			foreach ($data->result() as $row) {
				$result[] = array(
					$no,
					$row->id_admin,
					$row->nama_admin,
					'<a href="'.base_url().'admin/edit/'.$row->id_admin.'" id="edit_btn" name="edit_btn" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a> <a href="#" id="delete_btn" name="delete_btn" class="btn btn-danger" onclick="return deleteData(`'.$row->id_admin.'`,`'.$row->nama_admin.'`)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>',
				);
				$no++;
			}
		}

		$table['data'] = $result;

		header('Content-Type: application/json');
		echo json_encode($table, JSON_UNESCAPED_SLASHES);
		return;
	}
}
