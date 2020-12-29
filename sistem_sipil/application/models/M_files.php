<?php 
class M_files extends CI_Model{

	function get_all_files(){
		$hsl=$this->db->query("SELECT * FROM daftar");
		return $hsl;
	}

	function get_all_proyek(){
		$hsl=$this->db->query("SELECT `proyek`.`id_proyek`,`proyek`.`progress`,`proyek`.`owner`,`proyek`.`kontraktor`,`proyek`.`nilai`,`proyek`.`deskripsi`,`proyek`.`foto`,`proyek`.`file`,`proyek`.`Status_proyek`,`daftar`.`Nama1`,`daftar`.`Nama2` 
			FROM (`proyek`)
			JOIN `daftar` ON `proyek`.`siswa_id`=`daftar`.`siswa_id` ");
		return $hsl;
	}

	function get_all_surat(){
		$hsl=$this->db->query("SELECT `file_siswa`.`file_id`,`file_siswa`.`data1`,`file_siswa`.`data2`,`file_siswa`.`status_surat`,`daftar`.`Nama1`,`daftar`.`Nama2`
			FROM (`file_siswa`)
			JOIN `daftar`ON `file_siswa`.`siswa_id`=`daftar`.`siswa_id` ");
		return $hsl;
	}

	function get_all_laporan(){
		$hsl=$this->db->query("SELECT `laporan`.`id_laporan`,`laporan`.`file_laporan`,`laporan`.`Status_laporan`,`daftar`.`Nama1`,`daftar`.`Nama2`,`daftar`.`Nim1`,`daftar`.`Nim2` 
			FROM (`laporan`)
			JOIN `daftar` ON `laporan`.`siswa_id`=`daftar`.`siswa_id`");
		return $hsl;
	}
	
	function update_file($kode,$level){
		$hsl=$this->db->query("UPDATE daftar Set Status_daftar='$level' WHERE id_daftar='$kode'");
		return $hsl;
	}

	function update_proyek($kode,$level){
		$hsl=$this->db->query("UPDATE proyek Set status_proyek='$level' WHERE id_proyek='$kode'");
		return $hsl;
	}

	function update_surat($kode,$level){
		$hsl=$this->db->query("UPDATE file_siswa Set status_surat='$level' WHERE file_id='$kode'");
		return $hsl;
	}

	function update_laporan($kode,$level){
		$hsl=$this->db->query("UPDATE laporan Set Status_laporan='$level' WHERE id_laporan='$kode'");
		return $hsl;
	}
	
	function hapus_file($kode){
		$hsl=$this->db->query("DELETE FROM daftar WHERE id_daftar='$kode' ");
		return $hsl;
	}

	function hapus_proyek($kode){
		$hsl=$this->db->query("DELETE FROM proyek WHERE id_proyek='$kode' ");
		return $hsl;
	}

	function hapus_surat($kode){
		$hsl=$this->db->query("DELETE FROM file_siswa WHERE file_id='$kode' ");
		return $hsl;
	}

	function hapus_laporan($kode){
		$hsl=$this->db->query("DELETE FROM laporan WHERE id_laporan='$kode' ");
		return $hsl;
	}

	function get_file_byid($id){
		$hsl=$this->db->query("SELECT id_daftar,siswa_id,Nama1,Nama2,Nim1,Nim2,Transkip1,Transkip2,status_daftar FROM daftar WHERE id_daftar='$id'");
		return $hsl;
	}

	function get_proyek_byid($id){
		$hsl=$this->db->query("SELECT * FROM proyek WHERE id_proyek='$id'");
		return $hsl;
	}

	function get_surat_byid($id){
		$hsl=$this->db->query("SELECT * FROM file_siswa WHERE file_id='$id'");
		return $hsl;
	}
	
	function get_laporan_byid($id){
		$hsl=$this->db->query("SELECT * FROM laporan WHERE id_laporan='$id'");
		return $hsl;
	}

}