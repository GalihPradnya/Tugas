<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Logo_profil_model');
	}

	public function index()
	{	
		$data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
		$this->load->view('templates/dashboard_header', $data);
        $this->load->view('dashboard/beranda_view', $data);
        $this->load->view('templates/dashboard_footer', $data);
	}
}