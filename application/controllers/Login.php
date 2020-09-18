<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library('form_validation');
        if ($this->session->userdata('status') == "login") {
            echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '" . base_url('Pages/table_barang') . "';
            </script>"; //Url Logi
        }
    }
    public function index() {
        $this->load->view('pages/v_login');

    }
    public function regis() {
        $data['kategori'] = $this->M_produk->tampil_kategori();
        $this->load->view('mebel/register', $data);

    }
    

    // Register user
    public function register(){

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'noTelp', 'required');  
        $this->form_validation->set_rules('password', 'Password', 'required');

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');
        $password = $this->input->post('password');

        $cek = $this->db->query("SELECT * FROM kostumer WHERE email='$email'")->num_rows();

        
        if($this->form_validation->run() === FALSE) {
            $this->load->view('mebel/register');
        } else {
            if($cek>=1){
                echo "<script>
                        alert('Email sudah terdaftar');
                        window.location.href = '".base_url('Landing_controller/Login/regis')."';
                    </script>";
            }else{
                $data = [
                    'nama_kostumer'     => htmlspecialchars($nama, TRUE),
                    'email'             => htmlspecialchars($email, TRUE),
                    'no_telp'           => $telp,
                    'password'          => $password,
                    'date_created'      => time()
                ];
    
                $this->db->insert('kostumer', $data);
    
                echo "<script>
                    alert('Register Berhasil');
                    window.location.href = '".base_url('Landing_controller/Login/regis')."';
                </script>";
            }
        }
    }

    //ubahpassword
    public function ubahpassword()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'noTelp', 'required');  
        $this->form_validation->set_rules('password1', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password', 'required');

        $nama = $this->input->post('nama_kostumer');
        $email = $this->input->post('email');
        $telp = $this->input->post('no_telp');
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');

        $cek = $this->db->query("SELECT * FROM kostumer WHERE nama_kostumer='$nama' AND email='$email' AND no_telp='$telp'")->num_rows();

        
        // if($this->form_validation->run() === FALSE){
        //     $this->load->view('landing/loginuser');
            
        // } else {
            if($password1!=$password2){
                echo "<script>
                    alert('Password Tidak Sama');
                    window.location.href = '".base_url('Landing_controller/Login')."';
                    </script>"; 
            } else{
                if($cek>0){

                    $this->M_login->ubahpassword($nama,$email,$telp,$password2);
                     
                     echo "<script>
                     alert('Password Berhasil Diubah');
                     window.location.href = '".base_url('Landing_controller/Login')."';
                     </script>";
                 }else{
                     echo "<script>
                             alert('Nama, Email, atau No Telp yang anda Masukkan Salah');
                             window.location.href = '".base_url('Landing_controller/Login')."';
                         </script>";
                 }
            }
        // }
    }

    // Login User
    public function login(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if($this->form_validation->run() == FALSE) {
            $this->load->view('mebel/Login');
        } else {
            $this->aksi_login();
        }
    }

    function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
        $user = $this->db->get_where('admin', ['username' => $username])->row_array();
        $array = array('username' => $username, 'password' => $password);
        $pass = $this->db->get_where('admin', $array)->row_array();
        if ($user > 0) {
            if ($pass > 0) {
                
                    $data_session = array(
                        'id_admin' => $pass['id_admin'],
                        'username' => $pass['username'],
                        'status' => "login"
                    );
                    $this->session->set_userdata($data_session);
                    redirect('Pages/form_tambahumkm');
                   
            } else {
                $this->session->set_flashdata('password', '<div class="alert alert-danger" role="alert">Password anda salah!</div>');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('username', '<div class="alert alert-danger" role="alert">Username anda salah!</div>');
            redirect('Login');
        }
	}


    public function logout() {
        $this->session->unset_userdata('status');
		redirect(base_url('Login'));

    }

    public function beranda() {
        $this->load->view('Owner_view/VO_beranda');
    }

}
