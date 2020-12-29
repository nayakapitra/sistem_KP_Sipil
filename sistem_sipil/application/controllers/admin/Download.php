<?php
class Download extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_download');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->helper('download');
	}


	function index(){
		
		$x['data']=$this->m_download->get_all_files();
		$this->load->view('admin/v_data',$x);
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

	function simpan_file(){
				$config['upload_path'] = './assets/files/'; //path folder
	            $config['allowed_types'] = 'pdf|doc|docx|zip'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = 0;
				$config['encrypt_name'] = FALSE;

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $file=$gbr['file_name'];
	                        $id_admin=strip_tags($this->session->userdata('ses_id'));
							$judul=strip_tags($this->input->post('xjudul'));
							$oleh=strip_tags($this->input->post('xoleh'));
	
							$this->m_download->simpan_file($id_admin,$judul,$oleh,$file);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/download');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/download');
	                }
	                 
	            }else{
					redirect('admin/download');
				}
				
	}
	
	
	function update_file(){
				
						$kode=$this->input->post('kode');
	                    $judul=strip_tags($this->input->post('xjudul'));
						$deskripsi=$this->input->post('xdeskripsi');
						$oleh=strip_tags($this->input->post('xoleh'));
						$this->m_download->update_file_tanpa_file($kode,$judul,$deskripsi,$oleh);
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/download');
	            } 


	function hapus_file(){
		$kode=$this->input->post('kode');
		$data=$this->input->post('file');
		$path='./assets/files/'.$data;
		unlink($path);
		$this->m_download->hapus_file($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/download');
	}

}