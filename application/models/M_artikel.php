<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_artikel   extends CI_Model
{
    private $_table = 'artikel';

    public $judul_artikel;
    public $tanggal_publish;
    public $isi_artikel;
    public $gambar = 'profil.jpg'  ;

    function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [

            [
                'field' => 'no_transaksi',
                'label' => 'No Transaksi',
                'rules' => 'required'
            ],

        ];
    }

    public function get_barang()
    {
        return $this->db->query("SELECT * FROM barang JOIN kategori ON barang.id_kategori=kategori.id_kategori")->result();
    }

    public function get_by_id($no_transaksi)
    {
        return $this->db->get_where($this->_table, ['no_transaksi' => $no_transaksi])->row();
    }

    public function get_cekkel()
    {
        return $this->db->get_where($this->_table, ['status_2' => 'Terbaca'])->result();
    }
    public function get_cekkel2()
    {
        return $this->db->get_where($this->_table, ['status_2' => 'Terhapus'])->result();
    }
    function get_idbarang(){
        $this->db->select('RIGHT(barang.kode_barang,4) as kode', FALSE);
        $this->db->order_by('kode_barang','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('barang');     
        if($query->num_rows() <> 0){      
      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
        $kodejadi = "RJ".$kodemax;  
        return $kodejadi;
  }
    public function addArtikel()
    {
        $post = $this->input->post();
        $this->judul_artikel = $post['judul_artikel'];
        $this->tanggal_publish = $post['tanggal_publish'];
        $this->isi_artikel = $post['isi_artikel'];
        $this->gambar = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function updateArtikel($id_artikel)
    {
        $post = $this->input->post();
		$this->id_artikel = $id_artikel;
        $this->judul_artikel = $post['judul_artikel'];
        $this->tanggal_publish = $post['tanggal_publish'];
        $this->isi_artikel = $post['isi_artikel'];
        if (!empty($_FILES["gambar"]["name"])) {
            if ($post["oldfoto"] != 'profil.jpg') {
			}
			unlink(FCPATH . 'assets/img/' . $post['oldfoto']);
            $this->gambar = $this->_uploadImage();
        } else {
            $this->gambar = $post["oldfoto"];
		}
        $this->db->update($this->_table, $this, array("id_artikel" => $id_artikel));
    }
    public function getById($id_artikel)
    {
        return $this->db->get_where($this->_table, ["id_artikel" => $id_artikel])->row();
    }
    public function deleteArtikel($id_artikel)
    {
        $this->_deleteImage($id_artikel);
        return $this->db->delete($this->_table, array("id_artikel" => $id_artikel));
    }
    private function _deleteImage($id_artikel)
	{
    $product = $this->getById($id_artikel);
    if ($product->gambar != "camera.jpg") {
	    $filename = explode(".", $product->gambar)[0];
		return array_map('unlink', glob(FCPATH."assets/img/$filename.*"));
    }
	}

    public function hapus_sementara($status, $no_transaksi)
    {
        $this->db->query("UPDATE `cek_kelengkapan` SET `status_2`='$status' WHERE cek_kelengkapan.no_transaksi='$no_transaksi'");
    }

    function restore($status, $no_transaksi)
    {
        $query = $this->db->query("UPDATE `cek_kelengkapan` SET `status_2`='$status' WHERE no_transaksi='$no_transaksi'");
    }

    private function _uploadImage()
    {
        $data = array(); 
        
        $config['upload_path']          =  './assets/img';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['gambar']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
	}		
	
}
