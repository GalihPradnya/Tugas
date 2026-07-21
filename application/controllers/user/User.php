<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {   
        $data['title'] = 'Menu Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
        
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        

        $data['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();

        $this->form_validation->set_rules(
            'name',
            'Nama',
            'required'
        );

        if ($this->form_validation->run() == FALSE) {

            $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('templates/footer', $data);

}else {

    $name = $this->input->post('name');
    $email = $this->session->userdata('email');

    $this->db->set('name', $name);

    // cek apakah ada file yang diupload
    $upload_image = $_FILES['image']['name'];

    if ($upload_image) {

        $config['upload_path']   = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {

            $old_image = $data['user']['image'];

            if ($old_image != 'default.jpg') {

                unlink(FCPATH . 'assets/img/profile/' . $old_image);
            }

            $new_image = $this->upload->data('file_name');

            $this->db->set('image', $new_image);

            // update session image
            $this->session->set_userdata('image', $new_image);

        } else {

            echo $this->upload->display_errors();
            die;
        }
    }

    $this->db->where('email', $email);
    $this->db->update('user');
    $this->session->set_userdata([
    'name'  => $name,
    'image' => isset($new_image) ? $new_image : $data['user']['image']
]);

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
            Profil berhasil diperbarui!
        </div>'
    );

    redirect('user/user/edit');
}
    
    }
    public function updatePassword()
    {
        $user = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();

        $current_password = $this->input->post('current_password');
        $new_password     = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if (!password_verify($current_password, $user['password'])) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Password lama salah!
                </div>'
            );

            redirect('user/user/edit');
        }

        if ($new_password != $confirm_password) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Konfirmasi password tidak sama!
                </div>'
            );

            redirect('user/user/edit');
        }

        if ($current_password == $new_password) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Password baru tidak boleh sama dengan password lama!
                </div>'
            );

            redirect('user/user/edit');
        }

        $password_hash = password_hash(
            $new_password,
            PASSWORD_DEFAULT
        );

        $this->db->set('password', $password_hash);

        $this->db->where(
            'email',
            $this->session->userdata('email')
        );

        $this->db->update('user');
        

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Password berhasil diubah!
            </div>'
        );

        redirect('user/user/edit');
    }
}