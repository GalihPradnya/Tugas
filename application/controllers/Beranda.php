<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/dashboard_header');
        $this->load->view('dashboard/beranda_view');
        $this->load->view('templates/dashboard_footer');
	}
}