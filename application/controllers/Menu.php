<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Menu';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
        'required' => 'Nama menu wajib diisi!'

    ]);
     
        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer', $data);

        }
        else{
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Menu Baru!</div>');
            redirect('menu');
        }
    }
    public function delete($id)
    {
    $this->db->delete('user_menu', ['id' => $id]);

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success" role="alert">
            Menu berhasil dihapus!
        </div>'
    );

    redirect('menu');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');

        $this->db->set('menu', $menu);
        $this->db->where('id', $id);
        $this->db->update('user_menu');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">Menu berhasil diubah!</div>'
        );

        redirect('menu');
    }

    public function submenu()
    {   
        
        $data['title'] = 'Submenu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('title', 'Title', 'required|trim', [
            'required' => 'Title wajib diisi!'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => 'Menu wajib dipilih!'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required|trim', [
            'required' => 'URL wajib diisi!'
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim', [
            'required' => 'Icon wajib diisi!'
        ]);

        if ($this->form_validation->run() == false) {
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer', $data);
        }else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan SubMenu Baru!</div>');
            redirect('menu/submenu');
        }
    }
    public function editSubmenu()
{
    $id = $this->input->post('id');

    $data = [
        'title'     => $this->input->post('title'),
        'menu_id'   => $this->input->post('menu_id'),
        'url'       => $this->input->post('url'),
        'icon'      => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
    ];

    $this->db->where('id', $id);
    $this->db->update('user_sub_menu', $data);

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success" role="alert">
            Submenu berhasil diubah!
        </div>'
    );

    redirect('menu/submenu');
}

public function deleteSubmenu($id)
{
    $this->db->delete('user_sub_menu', ['id' => $id]);

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success" role="alert">
            Submenu berhasil dihapus!
        </div>'
    );

    redirect('menu/submenu');
}





}