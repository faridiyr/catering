<?php

class Admin extends CI_Controller
{
    public function index()
    {
        $this->check_login();

        $data['title'] = 'Home';
        $data['name'] = $this->session->userdata('name');
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function check_login()
    {
        if (!$this->session->userdata("login")) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect(base_url("auth"));
            //kalo member mencoba masuk
        } else if (($this->session->userdata('role_id')) != 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akses ditolak! Anda bukan admin! </div>');
            redirect('member');
        }
    }

    //--------------------------------------------------------- DASHBOARD -------------------------------------------------------------

    public function dashboard()
    {
        $this->check_login();
        $data["title"] = "Dashboard";
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function profile()
    {
        $this->check_login();

        $data['title'] = 'Profile';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function edit_profile()
    {
        $this->check_login();

        $data['title'] = 'Edit Profile';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/profile_edit', $data);
            $this->load->view('admin/partisi/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/avatar/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profile anda telah diperbarui!</div>');
            redirect('admin/profile');
        }
    }

    public function change_password()
    {
        $this->check_login();

        $data['title'] = 'Change Password';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/change_password', $data);
            $this->load->view('admin/partisi/footer');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));
            if ($current_password != $data['admin']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Currrent Password!</div>');
                redirect('admin/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as currrent password!</div>');
                    redirect('admin/change_password');
                } else {
                    $new_password_ = $new_password;

                    $this->db->set('password', $new_password_);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed!</div>');
                    redirect('admin/change_password');
                }
            }
        }
    }

    //------------------------------------------------------- USER ---------------------------------------------------------------


    public function user()
    {
        $this->check_login();
        $data["title"] = "User";
        $this->db->select('id, name, image, email, role_id, date_created');
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo var_dump($data['admin']);
        // die;
        $this->load->model('User_model');
        $data['user'] = $this->User_model->getUser();
        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function addUser()
    {
        $this->check_login();

        $data['title'] = 'Tambah User';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['level'] = $this->User_model->getUserRole();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('role_id', 'Level', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/user_tambah', $data);
            $this->load->view('admin/partisi/footer');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $role_id = $this->input->post('role_id');
            $is_active = 1;
            $date_created = time();

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/avatar/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/user');
                }
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role_id' => $role_id,
                'is_active' => $is_active,
                'date_created' => $date_created,
            ];

            $this->User_model->input_data($data, 'user');
            $this->session->set_flashdata('flashu', 'Ditambah');
            redirect('admin/user');
        }
    }

    public function userEdit($id)
    {
        $this->check_login();
        $data["title"] = "Edit User";
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->User_model->getUserById($id);
        $data['level'] = $this->User_model->getUserRole();

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('role_id', 'Id', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/user_edit', $data);
            $this->load->view('admin/partisi/footer');
        } else {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $role_id = $this->input->post('role_id');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/avatar/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/user');
                }
            }

            $this->User_model->userEdit($id, $name, $email, $role_id);
            $this->session->set_flashdata('flashu', 'Diubah');
            redirect('admin/user');
        }
    }


    public function deleteUser($id)
    {
        $this->check_login();
        $where = array('id' => $id);
        $this->User_model->delete_data($where, 'user');
        $this->session->set_flashdata('flashu', 'Dihapus');
        // $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">User berhasil dihapus.</div>');
        redirect('admin/user');
    }

    //---------------------------------------------------------PRODUK -------------------------------------------------------------


    public function produk()
    {
        $this->check_login();
        $data["title"] = "Produk";
        $this->db->select('id, name, image, email, role_id, date_created');
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Produk_model');
        $data['row'] = $this->Produk_model->getProduk();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/produk', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function addProduk()
    {
        $this->check_login();

        $data['title'] = 'Tambah Produk';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['level'] = $this->User_model->getUserRole();
        $data['nama_penjual'] = $this->Produk_model->getPenjual();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('id_penjual', 'Nama Penjual', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'numeric|required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/produk_tambah', $data);
            $this->load->view('admin/partisi/footer');
        } else {

            $nama_produk = $this->input->post('nama_produk');
            $id_penjual = $this->input->post('id_penjual');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/produk/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/produk');
                }
            }

            $data = [
                'nama_produk' => $nama_produk,
                'id_penjual' => $id_penjual,
                'harga' => $harga,
                'deskripsi' => $deskripsi
            ];

            $this->Produk_model->input_data($data, 'produk');
            $this->session->set_flashdata('flashp', 'Ditambah');
            redirect('admin/produk');
        }
    }

    public function produkEdit($id_produk)
    {
        $this->check_login();
        $data["title"] = "Edit Produk";
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Produk_model->getProdukById($id_produk);
        $data['nama_penjual'] = $this->Produk_model->getPenjual();
        //get penjual , data nama penjualnya nanti dikirim biar auto select pas di edit
        $data['penjual'] = $this->Produk_model->getPenjualById($id_produk);

        $this->form_validation->set_rules('id_produk', 'Id', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'numeric|required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/produk_edit', $data);
            $this->load->view('admin/partisi/footer');
        } else {
            $id_produk = $this->input->post('id_produk');
            $nama_produk = $this->input->post('nama_produk');
            $id_penjual = $this->input->post('id_penjual');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/produk/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/produk');
                }
            }
            $this->Produk_model->produkEdit($id_produk, $nama_produk, $id_penjual, $harga, $deskripsi);
            $this->session->set_flashdata('flashp', 'Diubah');
            redirect('admin/produk');
        }
    }

    public function deleteProduk($id_produk)
    {
        $this->Produk_model->deleteProduk($id_produk);
        // $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Produk berhasil dihapus.</div>');
        $this->session->set_flashdata('flashp', 'Dihapus');
        redirect('admin/produk');
    }


    //---------------------------------------------------------PEMESANAN -------------------------------------------------------------


    public function pemesanan()
    {
        $this->check_login();

        $data["title"] = "Pemesanan";
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pemesanan_model');
        $data['row'] = $this->Pemesanan_model->getPemesanan();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/pemesanan', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function addPemesanan()
    {
        $this->check_login();

        $data['title'] = 'Tambah Pemesanan';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama_produk'] = $this->Pemesanan_model->getProduk();
        $data['nama_pembeli'] = $this->Pemesanan_model->getPembeli();


        // $this->form_validation->set_rules('id_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_pembeli', 'Nama Pembeli', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/pemesanan_tambah', $data);
            $this->load->view('admin/partisi/footer');
        } else {

            $id_produk = $this->input->post('id_produk');
            $id_pembeli = $this->input->post('id_pembeli');
            $jumlah = $this->input->post('jumlah');
            $tanggal_pemesanan  = time();
            $status_pemesanan = 1;

            $data['item'] = $this->Produk_model->getHargaById($id_produk);
        }

        if ($this->input->post('jumlah')) {
            $jumlah = $this->input->post('jumlah');

            $data = [
                'id_produk' => $id_produk,
                'id_pembeli' => $id_pembeli,
                'jumlah' => $jumlah,
                'total_harga' => $data['item']['harga'] * $jumlah,
                'tanggal_pemesanan' => $tanggal_pemesanan,
                'status_pemesanan' => $status_pemesanan
            ];

            $this->Pemesanan_model->addPemesanan($data, 'pemesanan');
            $this->session->set_flashdata('flash', 'Ditambah');
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pemesanan Berhasil Ditambahkan!</div>');
            redirect('admin/pemesanan');
        }
    }


    public function deletePemesanan($id)
    {
        $this->check_login();

        $where = array('id_pemesanan' => $id);
        $this->Pemesanan_model->delete_data($where, 'pemesanan');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/pemesanan');
    }

    public function pemesananEdit($id_pemesanan)
    {
        $this->check_login();
        $data["title"] = "Edit Pemesanan";
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemesanan'] = $this->Pemesanan_model->getPemesananById($id_pemesanan);
        $data['nama_produk'] = $this->Pemesanan_model->getProduk();
        $data['nama_pembeli'] = $this->Pemesanan_model->getPembeli();

        $this->form_validation->set_rules('id_pemesanan', 'Id', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'numeric|required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/pemesanan_edit', $data);
            $this->load->view('admin/partisi/footer');
        } else {
            $id_pemesanan = $this->input->post('id_pemesanan');
            $id_produk = $this->input->post('id_produk');
            $id_pembeli = $this->input->post('id_pembeli');
            $jumlah = $this->input->post('jumlah');
            $tanggal_pemesanan = time();
            $data['item'] = $this->Produk_model->getHargaById($id_produk);
            $total_harga = $data['item']['harga'] * $jumlah;
            $this->Pemesanan_model->pemesananEdit($id_pemesanan, $id_produk, $id_pembeli, $jumlah, $total_harga, $tanggal_pemesanan);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Pemesanan berhasil diubah.</div>');
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/pemesanan');
        }
    }

    public function selesaiPemesanan($id_pemesanan)
    {
        $this->check_login();

        $data["title"] = "selesai Pemesanan";
        $data = $this->Pemesanan_model->getPemesananById($id_pemesanan);
        if ($data['status_pemesanan'] == 1) {
            $this->Pemesanan_model->selesaiPemesanan($id_pemesanan);
            $this->session->set_flashdata('flash', 'Diselesaikan');
        }
        redirect('admin/pemesanan');
    }
}
