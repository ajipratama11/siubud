<?php 
 
class M_login extends CI_Model{
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function cek_login2($table,$where2){		
		return $this->db->get_where($table,$where2);
	}
	function cek_login3($table,$where2){		
		return $this->db->get_where($table,$where2);
	}
	function iduser($username){
		$query = $this->db->query("SELECT * FROM user WHERE email='$username'");
		return $query->result();
	}
	function iduser2($username){
		$query = $this->db->query("SELECT * FROM `admin` WHERE username='$username'");
		return $query->result();
	}
	function hapusanorderlama(){
		$query = $this->db->query("DELETE pesan, keranjang, pengiriman FROM pesan JOIN keranjang ON keranjang.pesan_id_pesan=pesan.id_pesan JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim WHERE NOW() > pesan.jatuh_tempo ");
	}
	function get_iduser(){
          $this->db->select('RIGHT(user.id_user,4) as kode', FALSE);
		  $this->db->order_by('id_user','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('user');     
		  if($query->num_rows() <> 0){      
		
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		  $kodejadi = "10".$kodemax;  
		  return $kodejadi;
	}
	function tambah_user($iduser,$nama,$pass,$username,$level,$telp){
		$query = $this->db->query("INSERT INTO `user`(`id_user`, `password`, `nama_user`, `no_telp`, `alamat`, `kode_pos`, `email`) VALUES ('$iduser','$pass','$nama','$telp','','','$username')");
	}
	function ubahpassword($nama,$email,$telp,$password2){
		$query = $this->db->query("UPDATE `kostumer` SET `password`='$password2' WHERE nama_kostumer='$nama' AND email='$email' AND no_telp='$telp' ");
	}
}
?>
