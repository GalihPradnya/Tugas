<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Superadmin_model');
        $this->load->model('Logo_profil_model');
    }

public function index()
{

    $data['title'] = 'Dashboard';


    $data['user'] = $this->getUserLogin();



    $data['jumlahUser'] =
        $this->Superadmin_model->jumlahUser();


    $data['jumlahAdmin'] =
        $this->Superadmin_model->jumlahAdmin();


    $data['jumlahRole'] =
        $this->Superadmin_model->jumlahRole();


    $data['jumlahPengajuan'] =
        $this->Superadmin_model->jumlahPengajuan();


    $data['jumlahPengaduan'] =
        $this->Superadmin_model->jumlahPengaduan();


    $data['jumlahPendatang'] =
        $this->Superadmin_model->jumlahPendatang();


    $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('superadmin/index',$data);
    $this->load->view('templates/footer', $data);

}

       public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->getUserLogin();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules(
            'role',
            'Role',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/role', $data);
            $this->load->view('templates/footer', $data);

        } else {

            $this->db->insert('user_role', [
                'role' => $this->input->post('role')
            ]);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                    Role berhasil ditambahkan!
                </div>'
            );

            redirect('superadmin/role');
        }
    }
        public function updateRole()
    {
        $id = $this->input->post('id');
        $role = $this->input->post('role');

        $this->db->set('role', $role);
        $this->db->where('id', $id);
        $this->db->update('user_role');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Role berhasil diubah!
            </div>'
        );

        redirect('superadmin/role');
    }
    public function deleteRole($id)
    {
    // Jangan hapus role utama
    if ($id <= 3) {

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger">
                Role utama tidak boleh dihapus!
            </div>'
        );

        redirect('superadmin/role');
    }

    $this->db->delete('user_role', [
        'id' => $id
    ]);

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
            Role berhasil dihapus!
        </div>'
    );

    redirect('superadmin/role');
}
public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->getUserLogin();

        $data['role'] = $this->db->get_where(
            'user_role',
            ['id' => $role_id]
        )->row_array();
        $this->db->where('id !=', 1);

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/role_access', $data);
            $this->load->view('templates/footer', $data);
    }
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where(
            'user_access_menu',
            $data
        );

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
                Akses Diubah!
            </div>'
        );
    }
//     public function dataAdmin()
// {
//     $data['title'] = 'Edit Admin';

//     $data['admin'] = $this->db
//         ->get_where('user', ['role_id' => 2])
//         ->result_array();
    
//     $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
//     $this->load->view('templates/header', $data);
//     $this->load->view('templates/sidebar', $data);
//     $this->load->view('templates/topbar', $data);
//     $this->load->view('superadmin/data_admin', $data);
//     $this->load->view('templates/footer', $data);
// }

// public function tambahAdmin()
// {
//     $data['title'] = 'Tambah Admin';
//     $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

//     // Ambil penduduk yang belum memiliki akun
//     $data['penduduk'] = $this->db
//         ->query("
//             SELECT *
//             FROM penduduk
//             WHERE id NOT IN (
//                 SELECT penduduk_id
//                 FROM user
//                 WHERE penduduk_id IS NOT NULL
//             )
//         ")
//         ->result_array();

//     $this->form_validation->set_rules(
//         'penduduk_id',
//         'Penduduk',
//         'required'
//     );

//     $this->form_validation->set_rules(
//         'email',
//         'Email',
//         'required|trim|valid_email|is_unique[user.email]',
//         [
//             'is_unique' => 'Email sudah terdaftar!'
//         ]
//     );

//     $this->form_validation->set_rules(
//         'password',
//         'Password',
//         'required|min_length[6]'
//     );

//     if ($this->form_validation->run() == FALSE)
//     {
//         $this->load->view('templates/header', $data);
//         $this->load->view('templates/sidebar', $data);
//         $this->load->view('templates/topbar', $data);
//         $this->load->view('superadmin/tambah_admin', $data);
//         $this->load->view('templates/footer', $data);
//     }
//     else
//     {
//         $penduduk_id = $this->input->post('penduduk_id');

//         $penduduk = $this->db
//             ->get_where(
//                 'penduduk',
//                 [
//                     'id' => $penduduk_id
//                 ]
//             )
//             ->row_array();

//         if (!$penduduk)
//         {
//             $this->session->set_flashdata(
//                 'message',
//                 '<div class="alert alert-danger">
//                     Data penduduk tidak ditemukan!
//                 </div>'
//             );

//             redirect('superadmin/tambahAdmin');
//         }

//         $dataInsert = [

//             'penduduk_id' => $penduduk['id'],

//             'name' => $penduduk['nama_lengkap'],

//             'email' => htmlspecialchars(
//                 $this->input->post('email', true)
//             ),

//             'image' => 'default.jpg',

//             'password' => password_hash(
//                 $this->input->post('password'),
//                 PASSWORD_DEFAULT
//             ),

//             'role_id' => 2,

//             'is_active' => 1,

//             'date_created' => time()

//         ];

//         if ($this->db->insert('user', $dataInsert))
//         {
//             $this->session->set_flashdata(
//                 'message',
//                 '<div class="alert alert-success">
//                     Admin berhasil ditambahkan.
//                 </div>'
//             );
//         }
//         else
//         {
//             $this->session->set_flashdata(
//                 'message',
//                 '<div class="alert alert-danger">
//                     Gagal menambahkan admin.
//                 </div>'
//             );
//         }

//         redirect('superadmin/dataAdmin');
//     }
// }
// public function editAdmin($id = null)
// {
//     if ($id == null) {
//         redirect('superadmin/dataAdmin');
//     }

//     $data['title'] = 'Edit Admin';

//     $data['admin'] = $this->db
//         ->get_where(
//             'user',
//             [
//                 'id' => $id,
//                 'role_id' => 2
//             ]
//         )
//         ->row_array();

//     if (!$data['admin']) {

//         $this->session->set_flashdata(
//             'message',
//             '<div class="alert alert-danger">
//                 Data admin tidak ditemukan.
//             </div>'
//         );

//         redirect('superadmin/dataAdmin');
//     }

//     if (!$this->input->post()) {

//         $data['logoDesa'] =
//         $this->Logo_profil_model->getLogoDesa();

//         $this->load->view('templates/header', $data);
//         $this->load->view('templates/sidebar', $data);
//         $this->load->view('templates/topbar', $data);
//         $this->load->view('superadmin/edit_admin', $data);
//         $this->load->view('templates/footer', $data);

//     } else {

//         $email = trim(
//             $this->input->post('email')
//         );

//         // cek email sudah dipakai admin lain
//         $cekEmail = $this->db
//             ->where('email', $email)
//             ->where('id !=', $id)
//             ->get('user')
//             ->row_array();

//         if ($cekEmail) {

//             $this->session->set_flashdata(
//                 'message',
//                 '<div class="alert alert-danger">
//                     Email sudah digunakan user lain.
//                 </div>'
//             );

//             redirect('superadmin/editAdmin/'.$id);
//         }

//         $update = [

//             'name' => htmlspecialchars(
//                 $this->input->post('name', true)
//             ),

//             'email' => $email,

//             'is_active' => $this->input->post('is_active')

//         ];

//         // jika password diisi maka update password
//         if (!empty($this->input->post('password'))) {

//             $update['password'] = password_hash(
//                 $this->input->post('password'),
//                 PASSWORD_DEFAULT
//             );
//         }

//         $this->db->where('id', $id);
//         $this->db->update('user', $update);

//         $this->session->set_flashdata(
//             'message',
//             '<div class="alert alert-success">
//                 Data admin berhasil diperbarui.
//             </div>'
//         );

//         redirect('superadmin/dataAdmin');
//     }
// }
// public function hapusAdmin($id)
// {
//     // cegah menghapus akun yang sedang login
//     if ($id == $this->session->userdata('id')) {

//         $this->session->set_flashdata(
//             'message',
//             '<div class="alert alert-danger">
//                 Anda tidak bisa menghapus akun yang sedang digunakan.
//             </div>'
//         );

//         redirect('superadmin/dataAdmin');
//     }

//     $admin = $this->db->get_where(
//         'user',
//         [
//             'id' => $id,
//             'role_id' => 2
//         ]
//     )->row_array();

//     if (!$admin) {

//         $this->session->set_flashdata(
//             'message',
//             '<div class="alert alert-danger">
//                 Data admin tidak ditemukan.
//             </div>'
//         );

//         redirect('superadmin/dataAdmin');
//     }

//     $this->db->delete(
//         'user',
//         ['id' => $id]
//     );

//     $this->session->set_flashdata(
//         'message',
//         '<div class="alert alert-success">
//             Admin berhasil dihapus.
//         </div>'
//     );

//     redirect('superadmin/dataAdmin');
// }
public function dataAdmin()
{
    $data['title'] = 'Manajemen Admin';

    $data['user'] = $this->db
        ->select('
            user.id,
            user.role_id,
            user.is_active,
            user.email,
            user.image,
            penduduk.nik,
            penduduk.nama_lengkap
        ')
        ->from('user')
        ->join(
            'penduduk',
            'penduduk.id = user.penduduk_id',
            'left'
        )
        ->where('user.role_id !=', 1)
        ->order_by(
            'CASE WHEN user.role_id = 2 THEN 0 ELSE 1 END',
            '',
            false
        )
        ->order_by(
            'penduduk.nama_lengkap',
            'ASC'
        )
        ->get()
        ->result_array();

    $data['logoDesa'] =
        $this->Logo_profil_model->getLogoDesa();

    $this->load->view(
        'templates/header',
        $data
    );

    $this->load->view(
        'templates/sidebar',
        $data
    );

    $this->load->view(
        'templates/topbar',
        $data
    );

    $this->load->view(
        'superadmin/data_admin',
        $data
    );

    $this->load->view(
        'templates/footer',
        $data
    );
}
public function jadikanAdmin($id)
{
    $this->db->where('id', $id);

    $this->db->update(
        'user',
        [
            'role_id' => 2
        ]
    );

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
            User berhasil dijadikan Admin.
        </div>'
    );

    redirect('superadmin/dataAdmin');
}
public function jadikanMasyarakat($id)
{
    $this->db->where('id', $id);

    $this->db->update(
        'user',
        [
            'role_id' => 3
        ]
    );

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
            Admin berhasil dijadikan Masyarakat.
        </div>'
    );

    redirect('superadmin/dataAdmin');
}
public function profilDesa()
{
    $data['title'] = 'Logo Desa';

    $data['user'] = $this->getUserLogin();

    $this->load->model('Logo_profil_model');

    $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

    if ($this->input->post()) {

        $nama_desa = $this->input->post('nama_desa');

        $dataUpdate = [
            'nama_desa' => $nama_desa
        ];

        // Upload logo
        if (!empty($_FILES['logo']['name'])) {

            $config['upload_path']   = './uploads/logo/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo')) {

                $upload = $this->upload->data();

                $dataUpdate['logo'] = $upload['file_name'];
            }
        }

        $this->Logo_profil_model->updateProfil($dataUpdate);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Profil desa berhasil diperbarui.
            </div>'
        );

        redirect('superadmin/profilDesa');
    }
    $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('superadmin/profil_desa', $data);
    $this->load->view('templates/footer', $data);
}
private function getUserLogin()
{
    return $this->db
        ->select('
            user.*,
            penduduk.nama_lengkap,
            penduduk.nik
        ')
        ->from('user')
        ->join(
            'penduduk',
            'penduduk.id = user.penduduk_id',
            'left'
        )
        ->where(
            'user.id',
            $this->session->userdata('id')
        )
        ->get()
        ->row_array();
}

}