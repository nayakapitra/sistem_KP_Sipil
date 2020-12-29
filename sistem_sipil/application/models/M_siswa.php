<?php 
class M_siswa extends CI_Model{

	function get_all_siswa(){
		$hsl=$this->db->query("SELECT * FROM tbl_siswa");
		return $hsl;
	}

	function simpan_siswa($nis,$nama,$email,$password){
		$hsl=$this->db->query("INSERT INTO tbl_siswa (siswa_nis,siswa_nama,email_siswa,siswa_password) VALUES ('$nis','$nama','$email',md5('$password'))");
		return $hsl;
	}

	function update_siswa($kode,$nis,$nama,$email,$password){
		$hsl=$this->db->query("UPDATE tbl_siswa SET siswa_nis='$nis',siswa_nama='$nama',email_siswa='$email' ,siswa_password=md5('$password') WHERE siswa_id='$kode'");
		return $hsl;
	}
	function update_siswa_tanpa_pass($kode,$nis,$nama,$email){
		$hsl=$this->db->query("UPDATE tbl_siswa SET siswa_nis='$nis',siswa_nama='$nama',email_siswa='$email' WHERE siswa_id='$kode'");
		return $hsl;
	}

	function hapus_siswa($kode){
		$hsl=$this->db->query("DELETE FROM tbl_siswa WHERE siswa_id='$kode'");
		return $hsl;
	}
}