<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
    }
 
    function index(){
        $this->load->view('admin/v_login');
    }
 
    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_dosen=$this->M_login->auth_dosen($username,$password);
 
        if($cek_dosen->num_rows() > 0){ //jika login sebagai dosen
                $data=$cek_dosen->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['pengguna_level']=='1'){ //Akses admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_id',$data['pengguna_id']);
                    $this->session->set_userdata('ses_nama',$data['pengguan_nama']);
                    redirect('admin/dashboard');
 
                 }else{ //akses dosen
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('ses_id',$data['pengguna_id']);
                    $this->session->set_userdata('ses_nama',$data['pengguna_nama']);
                    redirect('dosen/welcome');
                 }
 
        }else{ //jika login sebagai mahasiswa
                    $cek_mahasiswa=$this->M_login->auth_mahasiswa($username,$password);
                    if($cek_mahasiswa->num_rows() > 0){
                            $data=$cek_mahasiswa->row_array();
                            $this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('akses','3');
                            $this->session->set_userdata('ses_id',$data['siswa_id']);
                            $this->session->set_userdata('ses_nama',$data['siswa_nama']);
                            redirect('mahasiswa/halaman');
                    }else{  // jika username dan password tidak ditemukan atau salah
                            $url=base_url();
                            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                            redirect($url);
                    }
        }
 
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
 
}