<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function index()
	{
		$this->load->view('depan/agenda');
	} 	
}
