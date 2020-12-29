<?php
class Files extends CI_Controller{
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
		
		$x['data']=$this->m_files->get_all_files();
		$this->load->view('admin/v_files',$x);
	}

	function download1(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_file_byid($id);
		$q=$get_db->row_array();
		$file1=$q['Transkip1'];
		$path='./asset/file/daftar/'.$file1;
		$data =  file_get_contents($path);
		$name = $file1;

		force_download($name, $data); 
		redirect('admin/files');
	}
	
	function download2(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_file_byid($id);
		$q=$get_db->row_array();
		$file2=$q['Transkip2'];
		$path='./asset/file/daftar/'.$file2;
		$data =  file_get_contents($path);
		$name = $file2;

		force_download($name, $data); 
		redirect('admin/files');
	}
	function update_file(){

						$kode=$this->input->post('kode');
	                    $level=$this->input->post('xlevel');
						$this->m_files->update_file($kode,$level);
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/files');
	            } 

	function hapus_file(){
		$kode=$this->input->post('kode');
		$data1=$this->input->post('file1');
		$data2=$this->input->post('file2');
		$path1='./assets/files/daftar/'.$data1;
		unlink($path1);
		$path2='./assets/files/daftar/'.$data2;
		unlink($path2);
		$this->m_files->hapus_file($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/files');
	}

}