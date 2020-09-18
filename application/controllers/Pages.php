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
		// if ($this->session->userdata('status') != "login") {
		//     echo "<script>
		//         alert('Anda harus login terlebih dahulu');
		//         window.location.href = '" . base_url('Login') . "';
		//     </script>"; //Url Logi
		// }
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
		$this->template->load("pages/v_tambahumkm", $param);
	}
	public function artikel()
	{
		$param['pageInfo'] = "List Artikel";
		$this->template->load("artikel/v_artikel", $param);
	}
	public function editartikel()
	{
		$kode_barang = $this->uri->segment(3);
		$param['edit'] = $this->db->query("SELECT * FROM barang WHERE kode_barang='$kode_barang'")->result();
		$param['pageInfo'] = "List Artikel";
		$this->template->load("artikel/v_editartikel", $param);
	}
	public function edit_kategori()
	{
		$this->load->view("pages/v_modal_edit_kategori");
	}
	public function edit_akun()
	{
		$this->load->view("pages/v_modal_edit_akun");
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


	public function delete_barang()
	{
		$kode_barang = $this->uri->segment(3);
		$this->M_barang->deleteBarang($kode_barang);
		$this->session->set_flashdata('success3', '<div class="alert alert-danger" role="alert">Barang Berhasil Di hapus :)</div>');
		redirect('Pages/table_barang');
	}
	public function delete_akun()
	{
		$id_akun = $this->uri->segment(3);
		$this->M_akun->deleteAkun($id_akun);
		$this->session->set_flashdata('deleteakun', '<div class="alert alert-danger" role="alert">Akun Berhasil Di hapus :)</div>');
		redirect('Pages/table_akun');
	}
	public function delete_kategori()
	{
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


	public function tambah_umkm()
	{
		$nama_umkm = $this->input->post('nama_umkm');
		$id_kategori = $this->input->post('id_kategori');
		$deskripsi = $this->input->post('deskripsi');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$no_hp = $this->input->post('no_hp');
		$whatsapp = $this->input->post('whatsapp');
		$fb = $this->input->post('fb');
		$instagram = $this->input->post('instagram');
		$images = '';
		if(!empty($_FILES['images']['name']) && count(array_filter($_FILES['images']['name'])) > 0){ 
			$filesCount = count($_FILES['images']['name']); 
			for($i = 0; $i < $filesCount; $i++){ 
				$_FILES['file']['name']     = $_FILES['images']['name'][$i]; 
				$_FILES['file']['type']     = $_FILES['images']['type'][$i]; 
				$_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i]; 
				$_FILES['file']['error']     = $_FILES['images']['error'][$i]; 
				$_FILES['file']['size']     = $_FILES['images']['size'][$i]; 
				 
				// File upload configuration 
				$uploadPath = 'assets/img/'; 
				$config['upload_path'] = $uploadPath; 
				$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
				//$config['max_size']    = '100'; 
				//$config['max_width'] = '1024'; 
				//$config['max_height'] = '768'; 
				 
				// Load and initialize upload library 
				$this->load->library('upload', $config); 
				$this->upload->initialize($config);

			   
				if($this->upload->do_upload('file')){ 
					// Uploaded file data 

					$fileData = $this->upload->data(); 
					$uploadData[$i]['file_name'] = $fileData['file_name']; 
					$images .= $_FILES['file']['name'].' | ';  
				}else{  
					$images .= $_FILES['file']['name'].' | ';  
				} 
			} 
			 
			if(!empty($uploadData)){ 
				// Insert files data into the database 
			  //  $insert = $this->file->insert($uploadData); 
			  $data2 = array(
				"nama_umkm" => $nama_umkm,
				"id_kategori" => $id_kategori,
				"deskripsi" => $deskripsi,
				"profil" => $this->_uploadImage(),
				"sampul" => $this->_uploadImage2(),
				"images" => $images,
				"nama_pemilik" => $nama_pemilik,
				"no_hp" => $no_hp,
				"whatsapp" => $whatsapp,
				"fb" => $fb,
				"instagram" => $instagram
			);
			$this->db->insert("umkm", $data2);
				 
				// Upload status message 
			  //  $statusMsg = $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 

			}else{ 
				$this->session->set_flashdata('tambahkategori', '<div class="alert alert-success" role="alert">Kategori Berhasil Disimpan :)</div>');
			} 
		}else{ 
			$this->session->set_flashdata('tambahkategori', '<div class="alert alert-success" role="alert">Kategori Berhasil Disimpan :)</div>');
		}
		$this->session->set_flashdata('tambahkategori', '<div class="alert alert-success" role="alert">Kategori Berhasil Disimpan :)</div>');
		redirect('Pages/table_kategori');
	}
	

	private function _uploadImage()
    {
        $data = array(); 
        
        $config['upload_path']          =  './assets/img/profil';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['profil']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profil')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
	}	
	private function _uploadImage2()
    {
        $data = array(); 
        
        $config['upload_path']          =  './assets/img/sampul';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['sampul']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('sampul')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
	}	
}
