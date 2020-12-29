<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_download');
        $this->load->library('upload');
		$this->load->helper('download');
	}
	public function index()
	{
		$nama1 = $this->session->userdata('ses_id');
		$x['daftar'] = $this->db->query("SELECT * FROM daftar WHERE siswa_id = '$nama1'")->row_array();
		$x['proyek'] = $this->db->query("SELECT * FROM proyek WHERE siswa_id = '$nama1'")->row_array();
		$x['file'] = $this->db->query("SELECT * FROM file_siswa WHERE siswa_id = '$nama1'")->row_array();
		$x['laporan'] = $this->db->query("SELECT * FROM laporan WHERE siswa_id = '$nama1'")->row_array();
		$x['data']=$this->m_download->get_all_files();
		$this->load->view('depan/halaman',$x);
	}

	function download(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_download->get_file_byid($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		$path='./assets/files/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
		redirect('admin/download');
	}
}