<?php
class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_files');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->helper('download');
	}


	function index(){
		
		$x['data']=$this->m_files->get_all_laporan();
		$this->load->view('admin/v_laporan',$x);
	}

	function download(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_laporan_byid($id);
		$q=$get_db->row_array();
		$file=$q['file_laporan'];
		$path='./asset/file/laporan/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
		redirect('admin/Laporan');
	}

	function update_file(){

						$kode=$this->input->post('kode');
	                    $level=$this->input->post('xlevel');
						$this->m_files->update_laporan($kode,$level);
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/Laporan');
	            } 

	function hapus_file(){
		$kode=$this->input->post('kode');
		$data=$this->input->post('file_laporan');
		$path='./asset/file/daftar/'.$data;
		unlink($path);
		$this->m_files->hapus_laporan($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/Laporan');
	}

}