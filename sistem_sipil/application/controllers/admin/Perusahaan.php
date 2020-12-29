<?php
class Perusahaan extends CI_Controller{
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
		
		$x['data']=$this->m_files->get_all_proyek();
		$this->load->view('admin/v_perusahaan',$x);
	}

	function downloadfile(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_proyek_byid($id);
		$q=$get_db->row_array();
		$file=$q['file'];
		$path='./asset/file/daftar/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
		redirect('admin/Perusahaan');
	}

	function downloadfoto(){
		$id=$this->uri->segment(4);
		$get_db=$this->m_files->get_proyek_byid($id);
		$q=$get_db->row_array();
		$foto=$q['foto'];
		$path='./asset/file/gambar/'.$foto;
		$data =  file_get_contents($path);
		$name = $foto;

		force_download($name, $data); 
		redirect('admin/Perusahaan');
	}
	
	function update_file(){

						$kode=$this->input->post('kode');
	                    $level=$this->input->post('xlevel');
						$this->m_files->update_proyek($kode,$level);
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/Perusahaan');
	            } 

	function hapus_file(){
		$kode=$this->input->post('kode');
		$data=$this->input->post('file');
		$path1='./asset/file/daftar/'.$data;
		unlink($path1);
		$foto=$this->input->post('foto');
		$path2='./asset/file/gambar/'.$foto;
		unlink($path2);
		$this->m_files->hapus_proyek($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/Perusahaan');
	}

}