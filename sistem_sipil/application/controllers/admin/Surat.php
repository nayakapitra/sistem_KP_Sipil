<?php
class Surat extends CI_Controller{
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
		
		$x['data']=$this->m_files->get_all_surat();
		$this->load->view('admin/v_surat',$x);
	}

	function download1(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_surat_byid($id);
		$q=$get_db->row_array();
		$file1=$q['data1'];
		$path='./asset/file/daftar/'.$file1;
		$data =  file_get_contents($path);
		$name = $file1;

		force_download($name, $data); 
		redirect('admin/Surat');
	}

	function download2(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_surat_byid($id);
		$q=$get_db->row_array();
		$file2=$q['data2'];
		$path='./asset/file/daftar/'.$file2;
		$data =  file_get_contents($path);
		$name = $file2;

		force_download($name, $data); 
		redirect('admin/Surat');
	}
	
	function update_file(){

						$kode=$this->input->post('kode');
	                    $level=$this->input->post('xlevel');
						$this->m_files->update_surat($kode,$level);
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/Surat');
	            } 

	function hapus_file(){
		$kode=$this->input->post('kode');
		$data=$this->input->post('data1');
		$path1='./asset/file/daftar/'.$data;
		unlink($path1);
		$file=$this->input->post('data2');
		$path2='./asset/file/file/'.$file;
		unlink($path2);
		$this->m_files->hapus_surat($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/Surat');
	}

}