<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Logo_profil_model');
    }

    public function login()
    
    {   
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',
            [
                'required' => 'Email Tidak Boleh Kosong!',
                'valid_email' => 'Email Tidak Valid!'
            ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim',
            [
                'required' => 'Password Tidak Boleh Kosong!'
            ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
        else {
            //validasi sukses
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        

        //usernya ada
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            //jika usernya aktif
            if($user['is_active'] == 1)
            {
                //cek password
                
                if(password_verify($password, $user['password'])){
                    $data = [
                        'id'       => $user['id'],
                        'email'    => $user['email'],
                        'name'     => $user['name'],
                        'image'    => $user['image'],
                        'role_id'  => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('superadmin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 3) {
                        redirect('beranda');
                    } else {
                        redirect('auth/login');
                    }
                  

                }
                else {
                    //password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('auth/login');
                }
                    

            }
            else{
                
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Diaktivasi!</div>');
                redirect('auth/login');
            }

        
        }
        else {
            //usernya tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar!</div>');
            redirect('auth/login');
        }
       
    }
    
    
    public function registration()
    {
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->form_validation->set_rules('name', 'Name', 'required|trim',
            [
                'required' => 'Nama Tidak Boleh Kosong!'
            ]   );
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',
            [
                'valid_email' => 'Email Tidak Valid!',
                'is_unique' => 'Email Sudah ada!'
            ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
            [
                'required' => 'Password Tidak Boleh Kosong!',
                'matches' => 'password tidak cocok!',
                'min_length' => 'Password terlalu pendek!'
            ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',
            [
                'matches' => 'password tidak cocok!'
            ]);

        if($this->form_validation->run() == false){

            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }
        else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun Anda Berhasil Dibuat. Silahkan Login.</div>');
            redirect('auth/login');
        }
    }
        public function logout()
        {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('image');
            $this->session->unset_userdata('role_id');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">Anda Telah Logout!</div>'
            );

            redirect('beranda');
        }
    public function blocked()
    {
        $this->load->view('auth/blocked');

    }
    public function testEmail()
{
    $config = array(
        'protocol'    => 'smtp',
        'smtp_host'   => 'ssl://smtp.gmail.com',
        'smtp_port'   => 465,
        'smtp_user'   => 'desakelating027@gmail.com',
        'smtp_pass'   => 'xqlt baye nmqg pxdt',
        'mailtype'    => 'html',
        'charset'     => 'utf-8',
        'newline'     => "\r\n",
        'crlf'        => "\r\n"
    );

    $this->load->library('email');

    $this->email->initialize($config);

    $this->email->from(
        'desakelating027@gmail.com',
        'Sistem Surat Desa'
    );

    $this->email->to('ekapretz887@gmail.com');

    $this->email->subject('Test Email');

    $this->email->message(
        '<h3>Email berhasil dikirim</h3>'
    );

    if($this->email->send())
    {
        echo 'BERHASIL';
    }
    else
    {
        echo '<pre>';
        echo $this->email->print_debugger();
        echo '</pre>';
    }
}
}
