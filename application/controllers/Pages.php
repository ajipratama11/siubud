<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->icon = "fa-desktop";
		$this->load->model('M_barang');
		$this->load->model('M_kategori');
		$this->load->model('M_akun');
		if ($this->session->userdata('status') != "login") {
            echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '" . base_url('Login') . "';
            </script>"; //Url Logi
        }
	}
	public function home()
	{
		$this->load->view("pages/home");
	}
	public function dashboard()
	{
		$param['pageInfo'] = "Dashboard";
	}
	public function form_tambahbarang()
	{
		$param['pageInfo'] = "Example Form";
		$param['kategori'] = $this->db->query("SELECT * FROM kategori")->result();
		$this->template->load("pages/v_tambahbarang", $param);
	}
	public function edit_kategori()
	{
		$this->load->view("pages/v_modal_edit_kategori");
	}
	public function edit_akun()
	{
		$this->load->view("pages/v_modal_edit_akun");
	}
	public function edit_barang()
	{
		$kode_barang = $this->uri->segment(3);
		$param['pageInfo'] = "Edit Form";
		$param['kategori'] = $this->db->query("SELECT * FROM kategori")->result();
		$param['edit'] = $this->db->query("SELECT * FROM barang WHERE kode_barang='$kode_barang'")->result();
		$this->template->load("pages/v_editbarang",$param);
	}
	public function tambah_stok()
	{
		$this->load->view("pages/v_modal_tambah_stok");
	}
	public function aksiedit_kategori()
	{
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
		$this->db->query("UPDATE `kategori` SET `nama_kategori`='$nama_kategori' WHERE id_kategori='$id_kategori'");
		$this->session->set_flashdata('updatekategori', '<div class="alert alert-success" role="alert">Barang Berhasil Disimpan :)</div>');
		redirect('Pages/table_kategori');
	}
	public function aksiedit_barang()
	{
		$kode_barang = $this->input->post('kode_barang');
		$this->M_barang->updateBarang($kode_barang);
		$this->session->set_flashdata('success2', '<div class="alert alert-warning" role="alert">Barang Berhasil Diedit :)</div>');
		redirect('Pages/table_barang');
	}
	public function aksiedit_akun()
	{
		$id_admin = $this->input->post('id_admin');
		$this->M_akun->updateAkun($id_admin);
		$this->session->set_flashdata('editakun', '<div class="alert alert-warning" role="alert">Akun Berhasil Diedit :)</div>');
		redirect('Pages/table_akun');
	}


	public function delete_barang(){
		$kode_barang = $this->uri->segment(3);
		$this->M_barang->deleteBarang($kode_barang);
		$this->session->set_flashdata('success3', '<div class="alert alert-danger" role="alert">Barang Berhasil Di hapus :)</div>');
		redirect('Pages/table_barang');
	}
	public function delete_akun(){
		$id_akun = $this->uri->segment(3);
		$this->M_akun->deleteAkun($id_akun);
		$this->session->set_flashdata('deleteakun', '<div class="alert alert-danger" role="alert">Akun Berhasil Di hapus :)</div>');
		redirect('Pages/table_akun');
	}
	public function delete_kategori(){
		$id_kategori = $this->uri->segment(3);
		$this->M_kategori->deleteKategori($id_kategori);
		$this->session->set_flashdata('deletekategori', '<div class="alert alert-success" role="alert">Kategori Berhasil Dihapus :)</div>');
		redirect('Pages/table_kategori');
	}
	public function table_barang()
	{
		$param['pageInfo'] = "Example Table";
		$param['barang'] = $this->M_barang->get_barang();
		$this->template->load("pages/v_barang", $param);
	}
	public function table_akun()
	{
		$param['pageInfo'] = "Tabel Akun";
		$param['akun'] = $this->M_akun->get_akun();
		$this->template->load("pages/v_akun", $param);
	}
	public function table_kategori()
	{
		$param['pageInfo'] = "Example Table";
		$param['kategori'] = $this->M_kategori->get_kategori();
		$this->template->load("pages/v_kategori", $param);
	}
	public function login()
	{
		$this->load->view("auth/login");
	}

	public function tambah_barang()
	{
		$kode_barang = $this->M_barang->get_idbarang();
		$this->M_barang->addBarang($kode_barang);
		$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Barang Berhasil Disimpan :)</div>');
		redirect('Pages/table_barang');
	}
	public function tambah_akun()
	{
		$username = $this->input->post('username');
		$sql = $this->db->query("SELECT * FROM `admin` WHERE username='$username'")->num_rows();

		if($sql != 0){
			$this->session->set_flashdata('usernamesudahada', '<div class="alert alert-danger" role="alert">Username sudah digunakan :)</div>');
		redirect('Pages/table_akun');
		}else{
			$this->M_akun->addAkun();
			$this->session->set_flashdata('usernamebelumada', '<div class="alert alert-success" role="alert">Berhasil Tambah Akun :)</div>');
			redirect('Pages/table_akun');
		}
	}
	public function tambah_kategori()
	{
		$id_kategori = $this->M_kategori->get_idkategori();
		$this->M_kategori->addKategori($id_kategori);
		$this->session->set_flashdata('tambahkategori', '<div class="alert alert-success" role="alert">Kategori Berhasil Disimpan :)</div>');
		redirect('Pages/table_kategori');
	}
}
