<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang   extends CI_Model
{
    private $_table = 'barang';

    public $kode_barang;
    public $nama_barang;
    public $id_kategori;
    public $harga_jual;
    public $keterangan  ;

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
    public function addBarang($kode_barang)
    {
        $post = $this->input->post();
        $this->kode_barang = $kode_barang;
        $this->nama_barang = $post['nama_barang'];
        $this->id_kategori = $post['id_kategori'];
        $this->harga_jual = $post['harga_jual'];
        $this->stok = $post['stok'];
        $this->keterangan = $post['keterangan'];
        $this->db->insert($this->_table, $this);
    }

    public function updateBarang($kode_barang)
    {
        $post = $this->input->post();
		$this->kode_barang = $kode_barang;
        $this->nama_barang = $post['nama_barang'];
        $this->id_kategori = $post['id_kategori'];
        $this->harga_jual = $post['harga_jual'];
        $this->keterangan = $post['keterangan'];
        $this->db->update($this->_table, $this, array("kode_barang" => $kode_barang));
    }

    public function deleteBarang($kode_barang)
    {
        return $this->db->delete($this->_table, array("kode_barang" => $kode_barang));
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
