<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori   extends CI_Model
{
    private $_table = 'kategori';

    public $id_kategori;
    public $nama_kategori;

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

    public function get_kategori()
    {
        return $this->db->get($this->_table)->result();
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
    function get_idkategori(){
        $this->db->select('RIGHT(kategori.id_kategori,4) as kode', FALSE);
        $this->db->order_by('id_kategori','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('kategori');     
        if($query->num_rows() <> 0){      
      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
        $kodejadi = "KB".$kodemax;  
        return $kodejadi;
  }
    public function addKategori($id_kategori)
    {
        $post = $this->input->post();
        $this->id_kategori = $id_kategori;
        $this->nama_kategori = $post['nama_kategori'];
        $this->db->insert($this->_table, $this);
    }

    public function update_cek_kelengkapan($status)
    {
        $post = $this->input->post();
        $this->no_transaksi = $post['no_transaksi'];
        $this->no_rekdis = $post['no_rekdis'];
        $this->nama_pasien = $post['nama_pasien'];
        $this->db->update($this->_table, $this, array("no_transaksi" => $post['no_transaksi']));
    }

    public function deleteKategori($id_kategori)
    {
         $this->db->query("DELETE kategori, barang FROM kategori INNER JOIN barang ON kategori.id_kategori=barang.id_kategori WHERE kategori.id_kategori='$id_kategori'");
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
