<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        $this->load->model('Logo_profil_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }



    // ============================
    // PROFILE
    // ============================

    public function index()
    {

        $data['title'] = 'Profile Saya';

        $data['user'] = $this->getUserLogin();


        $data['logoDesa'] =
        $this->Logo_profil_model->getLogoDesa();



        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/index',$data);
        $this->load->view('templates/footer',$data);

    }





    // ============================
    // EDIT PROFILE
    // ============================


    public function edit()
    {

        $data['title'] = 'Edit Profile';


        $data['user'] = $this->getUserLogin();



        $data['logoDesa'] =
        $this->Logo_profil_model->getLogoDesa();


        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|valid_email'
        );



        if($this->form_validation->run()==FALSE)
        {


            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('user/edit_profile',$data);
            $this->load->view('templates/footer',$data);


        }

        else
        {


            $id = $this->session->userdata('id');


            $dataUpdate = [

            'email'=>$this->input->post('email')

            ];



            // upload foto

            if(!empty($_FILES['image']['name']))
            {


                $config['upload_path'] =
                './assets/img/profile/';


                $config['allowed_types'] =
                'jpg|jpeg|png';


                $config['max_size'] = 2048;



                $this->upload->initialize($config);



                if($this->upload->do_upload('image'))
                {


                    $old_image =
                    $data['user']['image'];



                    if($old_image != 'default.jpg')
                    {

                        $file =
                        FCPATH.
                        'assets/img/profile/'.
                        $old_image;


                        if(file_exists($file))
                        {
                            unlink($file);
                        }

                    }



                    $new_image =
                    $this->upload->data('file_name');


                    $dataUpdate['image'] =
                    $new_image;



                    $this->session->set_userdata(
                        'image',
                        $new_image
                    );


                }

                else
                {

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                        '.$this->upload->display_errors().'
                        </div>'
                    );


                    redirect('user/user/edit');

                }


            }



            $this->db->where(
                'id',
                $id
            );


            $this->db->update(
                'user',
                $dataUpdate
            );



            // update session

        $this->session->set_userdata(
            [
                'email'=>$dataUpdate['email']
            ]
        );



            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                Profil berhasil diperbarui.
                </div>'
            );



            redirect('user/user/edit');

        }

    }






    // ============================
    // UPDATE PASSWORD
    // ============================


    public function updatePassword()
    {


        $user = $this->db->get_where(
            'user',
            [
                'id'=>$this->session->userdata('id')
            ]
        )->row_array();



        $current_password =
        $this->input->post('current_password');


        $new_password =
        $this->input->post('new_password');


        $confirm_password =
        $this->input->post('confirm_password');




        // cek password lama


        if(!password_verify(
            $current_password,
            $user['password']
        ))
        {


            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                Password lama salah!
                </div>'
            );


            redirect('user/user/edit');

        }





        // cek konfirmasi


        if($new_password != $confirm_password)
        {


            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                Konfirmasi password tidak sama!
                </div>'
            );


            redirect('user/user/edit');

        }





        // password sama


        if($current_password == $new_password)
        {


            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                Password baru tidak boleh sama!
                </div>'
            );


            redirect('user/user/edit');

        }





        $password_hash =
        password_hash(
            $new_password,
            PASSWORD_DEFAULT
        );



        $this->db->where(
            'id',
            $this->session->userdata('id')
        );


        $this->db->update(
            'user',
            [
                'password'=>$password_hash
            ]
        );



        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
            Password berhasil diubah.
            </div>'
        );


        redirect('user/user/edit');


    }

private function getUserLogin()
{
    return $this->db
        ->select('
            user.id,
            user.email,
            user.image,
            user.password,
            user.role_id,
            user.is_active,
            user.date_created,
            penduduk.nik,
            penduduk.nama_lengkap
        ')
        ->from('user')
        ->join(
            'penduduk',
            'penduduk.id = user.penduduk_id'
        )
        ->where(
            'user.id',
            $this->session->userdata('id')
        )
        ->get()
        ->row_array();
}

}