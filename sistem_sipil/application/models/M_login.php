<?php
class M_login extends CI_Model{

    function auth_dosen($username,$password){
        $query=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_username='$username' AND pengguna_password=MD5('$password') LIMIT 1");
        return $query;
    }
 
    //cek nim dan password mahasiswa
    function auth_mahasiswa($username,$password){
        $query=$this->db->query("SELECT * FROM tbl_siswa WHERE email_siswa='$username' AND siswa_password=MD5('$password') LIMIT 1");
        return $query;
    }

}
