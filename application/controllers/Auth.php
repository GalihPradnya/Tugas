<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');

        $this->load->model('Logo_profil_model');
        $this->load->model('Penduduk_model');
    }



    public function login()
    {   
        $data['logoDesa'] = 
        $this->Logo_profil_model->getLogoDesa();


        $this->form_validation->set_rules(
            'nik',
            'NIK',
            'required|trim',
            [
                'required' => 'NIK Tidak Boleh Kosong!'
            ]
        );


        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Tidak Boleh Kosong!'
            ]
        );



        if ($this->form_validation->run() == false) 
        {

            $data['title'] = 'User Login';


            $this->load->view(
                'templates/auth_header',
                $data
            );


            $this->load->view(
                'auth/login'
            );


            $this->load->view(
                'templates/auth_footer'
            );

        }
        else
        {

            $this->_login();

        }

    }






    private function _login()
    {

        $nik =
        $this->input->post('nik');


        $password =
        $this->input->post('password');



        $user =
        $this->Penduduk_model
        ->getUserByNik($nik);



        if($user)
        {


            if($user['is_active'] == 1)
            {


                if(password_verify($password,$user['password']))
                {



                    /*
                    ==========================
                    SESSION USER
                    ==========================
                    */


                    $data = [


                        'id' =>
                        $user['id'],


                        'nik' =>
                        $user['nik'],


                        'email' =>
                        $user['email'],


                        'nama_lengkap' =>
                        $user['nama_lengkap'],


                        'image' =>
                        $user['image'],


                        'role_id' =>
                        $user['role_id'],


                        'penduduk_id' =>
                        $user['penduduk_id'],


                        // TAMBAHAN BARU
                        'status_warga' =>
                        $user['status_warga']


                    ];



                    $this->session
                    ->set_userdata($data);
                    $this->session->set_userdata($data);




                    /*
                    ==========================
                    REDIRECT ROLE
                    ==========================
                    */


                    if($user['role_id'] == 1)
                    {

                        redirect('superadmin');

                    }
                    elseif($user['role_id'] == 2)
                    {

                        redirect('admin');

                    }
                    elseif($user['role_id'] == 3)
                    {

                        redirect('beranda');

                    }
                    else
                    {

                        redirect('auth/login');

                    }



                }
                else
                {

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                        Password Salah!
                        </div>'
                    );


                    redirect('auth/login');

                }



            }
            else
            {

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    Akun Belum Diaktivasi!
                    </div>'
                );


                redirect('auth/login');

            }



        }
        else
        {


            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                NIK Tidak Terdaftar!
                </div>'
            );


            redirect('auth/login');


        }


    }








    public function registration()
    {

        $data['logoDesa'] =
        $this->Logo_profil_model->getLogoDesa();



        $this->form_validation->set_rules(
            'name',
            'Name',
            'required|trim',
            [
                'required'=>'Nama Tidak Boleh Kosong!'
            ]
        );



        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'valid_email'=>'Email Tidak Valid!',
                'is_unique'=>'Email Sudah ada!'
            ]
        );



        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'required'=>'Password Tidak Boleh Kosong!',
                'matches'=>'Password tidak cocok!',
                'min_length'=>'Password terlalu pendek!'
            ]
        );



        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim|matches[password1]',
            [
                'matches'=>'Password tidak cocok!'
            ]
        );




        if($this->form_validation->run()==false)
        {


            $data['title']='User Registration';


            $this->load->view(
                'templates/auth_header',
                $data
            );


            $this->load->view(
                'auth/registration'
            );


            $this->load->view(
                'templates/auth_footer'
            );



        }
        else
        {


            $data=[

                'name'=>
                htmlspecialchars(
                    $this->input->post('name',true)
                ),


                'email'=>
                htmlspecialchars(
                    $this->input->post('email',true)
                ),


                'image'=>'default.jpg',


                'password'=>
                password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),


                'role_id'=>3,


                'is_active'=>1,


                'date_created'=>time()

            ];



            $this->db->insert(
                'user',
                $data
            );



            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                Selamat! Akun berhasil dibuat.
                Silahkan Login.
                </div>'
            );


            redirect('auth/login');

        }


    }








    public function logout()
    {

        $this->session->unset_userdata([

            'id',

            'nik',

            'email',

            'name',

            'nama_lengkap',

            'image',

            'role_id',

            'penduduk_id',

            // TAMBAHAN BARU
            'status_warga'

        ]);



        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
            Anda Telah Logout!
            </div>'
        );



        redirect('beranda');

    }






    public function blocked()
    {

        $this->load->view(
            'auth/blocked'
        );

    }



}