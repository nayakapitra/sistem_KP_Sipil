<?php 
class M_daftar extends CI_Model{


	function simpan($id_admin,$nama1,$nama2,$nim1,$nim2,$file1,$file2,$status_kp){
		$hsl=$this->db->query("INSERT INTO daftar (id_daftar,siswa_id,Nama1,Nama2,Nim1,Nim2,Transkip1,Transkip2,Status_daftar) VALUES ('','$id_admin','$nama1','$nama2','$nim1','$nim2','$file1','$file2','$status_kp')");
		return $hsl;
	}

	function perusahaan($id_admin,$progress,$owner,$kontraktor,$nilai,$deskripsi,$foto,$fileproyek,$status_proyek){
		$hsl=$this->db->query("INSERT INTO proyek (id_proyek,siswa_id,progress,owner,kontraktor,nilai,deskripsi,foto,file,Status_proyek) VALUES ('','$id_admin','$progress','$owner','$kontraktor','$nilai','$deskripsi','$foto','$fileproyek','$status_proyek')");
		return $hsl;
	}

	function simpan_file($id_admin,$file1,$file2,$status){
		$hsl=$this->db->query("INSERT INTO file_siswa (file_id,siswa_id,data1,data2,status_surat) VALUES ('','$id_admin','$file1','$file2','$status')");
		return $hsl;
	}

	function simpan_laporan($id_admin,$file1,$status){
		$hsl=$this->db->query("INSERT INTO laporan (id_laporan,siswa_id,file_laporan,Status_laporan) VALUES ('','$id_admin','$file1','$status')");
		return $hsl;
	}

}