<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_daftar');
		$this->load->library('upload');
	}
	public function index()
	{
		$nama1 = $this->session->userdata('ses_id');
		$isi['status_daftar_proyek'] = $this->db->query("SELECT id_proyek FROM proyek WHERE siswa_id = '$nama1'")->num_rows();
		$isi['daftar'] = $this->db->query("SELECT * FROM daftar WHERE siswa_id = '$nama1'")->row_array();
		$isi['proyek'] = $this->db->query("SELECT * FROM proyek WHERE siswa_id = '$nama1'")->row_array();
		$isi['file'] = $this->db->query("SELECT * FROM file_siswa WHERE siswa_id = '$nama1'")->row_array();
		$isi['laporan'] = $this->db->query("SELECT * FROM laporan WHERE siswa_id = '$nama1'")->row_array();
		$this->load->view('depan/perusahaan',$isi);
	} 	

	function simpan(){
				$config['upload_path'] = './asset/file/gambar/'; //path folder
	            $config['allowed_types'] = 'jpg|jpeg|png|zip'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = 0;
				$config['encrypt_name'] = FALSE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('filefoto'))
	                {
	                        $data = $this->upload->data();
	                        $foto=$data['file_name'];
				}else{
	                    $this->load->view('mahasiswa/halaman');
	            }

	            $config['upload_path'] = './asset/file/daftar/'; //path folder
	            $config['allowed_types'] = 'pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = 0;
				$config['encrypt_name'] = FALSE;
 //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('filedata'))
	                {
	                        $data = $this->upload->data();
	                        $fileproyek=$data['file_name'];
				}else{
	                    $this->load->view('mahasiswa/halaman');
	            }

	        $id_admin=strip_tags($this->session->userdata('ses_id'));
	        $progress=strip_tags($this->input->post('progress'));
			$owner=strip_tags($this->input->post('owner'));
			$kontraktor=strip_tags($this->input->post('kontraktor'));
			$nilai=strip_tags($this->input->post('nilai'));
			$deskripsi=strip_tags($this->input->post('deskripsi'));
			$status_proyek=0;

			$this->m_daftar->perusahaan($id_admin,$progress,$owner,$kontraktor,$nilai,$deskripsi,$foto,$fileproyek,$status_proyek);
			echo $this->session->set_flashdata('msg','success');
			redirect('mahasiswa/halaman');
				
	}
}