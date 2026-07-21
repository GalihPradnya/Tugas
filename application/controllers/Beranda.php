<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Logo_profil_model');
		$this->load->model('Profil_model');
		$this->load->model('Berita_pengumuman_model');
		$this->load->model('Galeri_model');
		$this->load->model('Kontak_model');
		$this->load->model('Hero_model');
	}

	public function index()
	{	
		$data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
		$data['profil'] = $this->Profil_model->getProfil();
		// Ambil 3 berita terbaru
        $data['berita'] = $this->Berita_pengumuman_model->getBeritaLimit(2);
		// Ambil 3 pengumuman terbaru
        $data['pengumuman'] = $this->Berita_pengumuman_model->getPengumumanLimit(1);
		$data['galeri'] = $this->Galeri_model->getLimitGaleri(4);
		$data['hero'] = $this->Hero_model->getHero();
		$data['slides'] = $this->Hero_model->getSlide();
		// Kontak Desa
   		$data['kontak'] = $this->Kontak_model->getKontak();
		$this->load->view('templates/dashboard_header', $data);
        $this->load->view('dashboard/beranda_view', $data);
        $this->load->view('templates/dashboard_footer', $data);
	}
}