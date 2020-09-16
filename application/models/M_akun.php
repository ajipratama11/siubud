<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_akun   extends CI_Model
{
    private $_table = 'admin';

    public $username;
    public $password;
    public $no_tlp;

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

    public function get_akun()
    {
        return $this->db->query("SELECT * FROM `admin`")->result();
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
    public function addAkun()
    {
        $post = $this->input->post();
        $this->username = $post['username'];
        $this->password = $post['password'];
        $this->no_tlp = $post['no_tlp'];
        $this->db->insert($this->_table, $this);
    }

    public function updateAkun($id_admin)
    {
        $post = $this->input->post();
		$this->id_admin = $id_admin;
        $this->username = $post['username'];
        $this->password = $post['password'];
        $this->no_tlp = $post['no_tlp'];
        $this->db->update($this->_table, $this, array("id_admin" => $id_admin));
    }

    public function deleteAkun($id_admin)
    {
        return $this->db->delete($this->_table, array("id_admin" => $id_admin));
    }

    public function hapus_sementara($status, $no_transaksi)
    {
        $this->db->query("UPDATE `cek_kelengkapan` SET `status_2`='$status' WHERE cek_kelengkapan.no_transaksi='$no_transaksi'");
    }

    function restore($status, $no_transaksi)
    {
        $query = $this->db->query("UPDATE `cek_kelengkapan` SET `status_2`='$status' WHERE no_transaksi='$no_transaksi'");
    }
	
}
