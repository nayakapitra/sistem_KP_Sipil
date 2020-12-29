<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
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
		$nama1 = $this->session->userdata('ses_nama');
		$id1 = $this->session->userdata('ses_id');
		$isi['status_daftar_kp'] = $this->db->query("SELECT id_daftar FROM daftar WHERE Nama1 = '$nama1'")->num_rows();
		$isi['daftar'] = $this->db->query("SELECT * FROM daftar WHERE siswa_id = '$id1'")->row_array();
		$isi['proyek'] = $this->db->query("SELECT * FROM proyek WHERE siswa_id = '$id1'")->row_array();
		$isi['file'] = $this->db->query("SELECT * FROM file_siswa WHERE siswa_id = '$id1'")->row_array();
		$isi['laporan'] = $this->db->query("SELECT * FROM laporan WHERE siswa_id = '$id1'")->row_array();
		$this->load->view('depan/daftar',$isi);
	}

	function simpan(){
				$config['upload_path'] = './asset/file/daftar/'; //path folder
	            $config['allowed_types'] = 'pdf|zip'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = 0;
				$config['encrypt_name'] = FALSE;

	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('transkip1'))
	                {
	                        $data = $this->upload->data();
	                        $file1=$data['file_name'];
				}else{
	                    $this->load->view('mahasiswa/halaman');
	            }

	            $config['upload_path'] = './asset/file/daftar/'; //path folder
	            $config['allowed_types'] = 'pdf|zip'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = 0;
				$config['encrypt_name'] = FALSE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('transkip2'))
	                {
	                        $data = $this->upload->data();
	                        $file2=$data['file_name'];
				}else{
	                    $this->load->view('mahasiswa/halaman');
	            }

	       	$id_admin=strip_tags($this->session->userdata('ses_id'));
	        $nama1=strip_tags($this->input->post('nama1'));
			$nama2=strip_tags($this->input->post('nama2'));
			$nim1=strip_tags($this->input->post('nim1'));
			$nim2=strip_tags($this->input->post('nim2'));
			$status_kp = 0;

			if ($nama2 != $nama1) {
				$this->m_daftar->simpan($id_admin,$nama1,$nama2,$nim1,$nim2,$file1,$file2,$status_kp);
			echo $this->session->set_flashdata('msg','success');
			redirect('mahasiswa/halaman');
			}
			else{
				echo $this->session->set_flashdata('msg','warning');
	            redirect('mahasiswa/daftar');
			}
	}
}