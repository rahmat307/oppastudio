<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function index() {
		$this->load->view('welcome_message');
	}

	public function view() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$message = $this->session->flashdata('message');

		$view['page_content'] = 'productview';
		$view['activeMenu'] = 'product';
		$view['message'] = $message;
		$this->session->set_flashdata('message', $message);

		$this->load->view('template', $view);
	}

	public function add() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$message = $this->session->flashdata('message');

		$view['page_content'] = 'productadd';
		$view['activeMenu'] = 'product';

		$this->form_validation->set_rules('kode_item', 'Kode Item', 'trim|required|min_length[8]|max_length[8]|is_unique[t_products.kode_product]', array('required' => 'Kode Item tidak boleh kosong'));
		$this->form_validation->set_rules('nama_item', 'Nama Item', 'trim|required|min_length[4]|max_length[200]', array('required' => 'Nama Item tidak boleh kosong'));
		$this->form_validation->set_rules('harga_item', 'Harga Item', 'trim|required|numeric', array('required' => 'Harga Item tidak boleh kosong'));

		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|integer', array('required' => 'Harga Item tidak boleh kosong'));
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'Keterangan Hanya boleh alphabet, numerik, dan spasi'));

		if ($this->form_validation->run() == FALSE){

		} else {
			$kode_item = $this->input->post('kode_item');
			$nama_item = $this->input->post('nama_item');
			$harga_item = $this->input->post('harga_item');
			$kapasitas = $this->input->post('kapasitas');
			$keterangan = $this->input->post('keterangan');

			$query = "INSERT INTO `t_products`(`id_product`, `kode_product`, `nama_product`, `harga_product`, `kapasitas`, `keterangan`, `status_product`, `tgl_pembuatan`) VALUES (DEFAULT,'$kode_item','$nama_item','$harga_item','$kapasitas','$keterangan',1,DEFAULT)";


			$data = $this->db->query($query);
			$check_add = $this->db->affected_rows();

			if ($check_add == TRUE){
				$message = '<div class="alert alert-success"><strong>Sukses!</strong> Data Product berhasil ditambahkan</div>';
				$view['message'] = $message;
				$this->session->set_flashdata('message', $message);
				redirect(base_url().'product/view');
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

	public function list_product() {
		if (@$this->session->isLogin == '') redirect(base_url().'login');
		$result = array();
		
		$query = "SELECT * FROM t_products  LEFT JOIN t_promo USING(id_promo) order by tgl_pembuatan DESC";

		$data = $this->db->query($query);

		if ($data->num_rows() > 0){
			$no = 1;
			foreach ($data->result() as $row) {
				$promo = '';
				$kapasitas = trim($row->kapasitas);
				$kapasitas_txt = '';

				if (trim($row->kode_promo) != '' && trim($row->nama_promo) != ''){
					$promo = $row->kode_promo.'-'.$row->nama_promo;
				}

				if ($kapasitas == NULL || $kapasitas == '' || $kapasitas == 0){
					$kapasitas_txt = 'Bebas';
				} else {
					$kapasitas_txt = $kapasitas.' Orang';
				}
				
				$result[] = array(
					$no,
					$row->kode_product,
					$row->nama_product,
					$row->harga_product,
					$promo,
					$row->potongan_harga,
					(float)$row->harga_product - (float)$row->potongan_harga,
					$kapasitas_txt,
					$row->keterangan,
					'<a href="'.base_url().'member/edit/'.$row->kode_product.'" id="edit_btn" name="edit_btn" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a> <a href="#" id="delete_btn" name="delete_btn" class="btn btn-danger" onclick="return deleteData('.$row->kode_product.',`'.$row->nama_product.'`)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>',
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
