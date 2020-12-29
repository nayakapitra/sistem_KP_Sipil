<?php
class Siswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_siswa');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_siswa->get_all_siswa();
		$this->load->view('admin/v_siswa',$x);
	}
	
	function simpan_siswa(){
			
	            	$nis=strip_tags($this->input->post('xnis'));
					$nama=strip_tags($this->input->post('xnama'));
					$email=strip_tags($this->input->post('xemail'));
					$password=$this->input->post('xpassword');
                    $konfirm_password=$this->input->post('xpassword2');
                    if ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('admin/pengguna');
     				}else{
	               		$this->m_siswa->simpan_siswa($nis,$nama,$email,$password);
						echo $this->session->set_flashdata('msg','success');
						redirect('admin/siswa');
	               	}
				}
				
	
	function update_siswa(){

							$kode=$this->input->post('kode');
							$nis=strip_tags($this->input->post('xnis'));
							$nama=strip_tags($this->input->post('xnama'));
							$email=strip_tags($this->input->post('xemail'));
							$password=$this->input->post('xpassword');
                    		$konfirm_password=$this->input->post('xpassword2');

							if (empty($password) && empty($konfirm_password)) {
                       			$this->m_siswa->update_siswa_tanpa_pass($kode,$nis,$nama,$email);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('admin/siswa');
     						}elseif ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('admin/siswa');
     						}else{
			               		$this->m_siswa->update_siswa($kode,$nis,$nama,$email,$password);
								echo $this->session->set_flashdata('msg','info');
								redirect('admin/siswa');
	               	}
	            } 


	function hapus_siswa(){
		$kode=$this->input->post('kode');
		$this->m_siswa->hapus_siswa($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/siswa');
	}

}