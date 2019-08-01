<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {
	public function index() {
		$this->load->view('welcome_message');
	}

	public function view() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$message = $this->session->flashdata('message');

		$view['page_content'] = 'promoview';
		$view['activeMenu'] = 'promo';
		$view['message'] = $message;
		$this->session->set_flashdata('message', $message);

		$this->load->view('template', $view);
	}

	public function add() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$message = $this->session->flashdata('message');

		$nama_member = $this->input->post('nama_member');
		$notelp_member = $this->input->post('notelp_member');
		$alamat_member = $this->input->post('alamat_member');


		$view['page_content'] = 'productadd';
		$view['activeMenu'] = 'product';

		$this->form_validation->set_rules('nama_member', 'Nama Member', 'required', array('required' => 'Nama Member tidak boleh kosong'));
		$this->form_validation->set_rules('notelp_member', 'No Telepon', 'required', array('required' => 'No Telepon tidak boleh kosong'));
		$this->form_validation->set_rules('alamat_member', 'Alamat', 'required', array('required' => 'Alamat tidak boleh kosong'));

		if ($this->form_validation->run() == FALSE){

		} else {
			$query = "INSERT INTO `t_member`(`id_member`, `nama_member`, `no_telepon`, `alamat`, `point`) VALUES (NULL,'$nama_member','$notelp_member','$alamat_member',0)";

			// INSERT INTO `t_products`(`id_product`, `kode_product`, `nama_product`, `harga_product`, `kapasitas`, `keterangan`, `status_product`, `tgl_pembuatan`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])


			$data = $this->db->query($query);
			$check_add = $this->db->affected_rows();

			if ($check_add == TRUE){
				$message = '<div class="alert alert-success"><strong>Sukses!</strong> Data Member berhasil ditambahkan</div>';
				$view['message'] = $message;
				$this->session->set_flashdata('message', $message);
				redirect(base_url().'member/view');
			} else {
				
			}
		}

		$this->load->view('template', $view);
	}

	public function edit($id=0) {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$message = $this->session->flashdata('message');

		$nama_member = $this->input->post('nama_member');
		$notelp_member = $this->input->post('notelp_member');
		$alamat_member = $this->input->post('alamat_member');


		$view['page_content'] = 'memberedit';
		$view['activeMenu'] = 'member';

		$query = "SELECT * from t_member where id_member = $id";

		$data = $this->db->query($query);

		if ($data->num_rows() > 0){
			foreach ($data->result() as $row) {
				$view['id_member'] = $row->id_member;
				$view['nama_member'] = $row->nama_member;
				$view['notelp_member'] = $row->no_telepon;
				$view['alamat_member'] = $row->alamat;

			}
		}

		$this->form_validation->set_rules('nama_member', 'Nama Member', 'required', array('required' => '*Nama Member tidak boleh kosong'));
		$this->form_validation->set_rules('notelp_member', 'No Telepon', 'required', array('required' => '*No Telepon tidak boleh kosong'));
		$this->form_validation->set_rules('alamat_member', 'Alamat', 'required', array('required' => '*Alamat tidak boleh kosong'));

		if ($this->form_validation->run() == FALSE){

		} else {
			$query = "UPDATE `t_member` SET `nama_member`='$nama_member',`no_telepon`='$notelp_member',`alamat`='$alamat_member' WHERE id_member = $id";

			$data = $this->db->query($query);
			$check_add = $this->db->affected_rows();

			if ($check_add == TRUE){
				$message = '<div class="alert alert-success"><strong>Sukses!</strong> Data Member berhasil diubah</div>';
				$view['message'] = $message;
				$this->session->set_flashdata('message', $message);
				redirect(base_url().'member/view');
			} else {
				redirect(base_url().'member/view');
			}
		}

		$this->load->view('template', $view);
	}

	public function delete() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$message = '';
		$id_member = $this->input->post('id');
		$query = "DELETE FROM `t_member` WHERE id_member = ".$id_member;

		$data = $this->db->query($query);

		if ($data){
			$message = '<div class="alert alert-success"><strong>Sukses!</strong> Data Member berhasil dihapus</div>';
			$view['message'] = $message;
			$this->session->set_flashdata('message', $message);
		} else {
			$message = '';
		}

		header('Content-Type: application/json');
		echo json_encode($message, JSON_UNESCAPED_SLASHES);
		return;
	}

	public function list_promo() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$result = array();
		
		$query = "SELECT * FROM t_promo order by id_promo DESC";

		$data = $this->db->query($query);

		if ($data->num_rows() > 0){
			$no = 1;
			foreach ($data->result() as $row) {
				$result[] = array(
					$no,
					$row->kode_promo,
					$row->nama_promo,
					$row->potongan_harga,
					$row->tgl_mulai,
					$row->tgl_akhir,
					$row->waktu_mulai.'-'.$row->waktu_akhir,
					$row->status_promo,
					'<a href="'.base_url().'member/edit/'.$row->kode_promo.'" id="edit_btn" name="edit_btn" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a> <a href="#" id="delete_btn" name="delete_btn" class="btn btn-danger" onclick="return deleteData('.$row->kode_promo.',`'.$row->nama_promo.'`)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>',
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
