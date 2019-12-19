<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (($this->session->userdata('login')) == true) {
            if (($this->session->userdata('role_id') == 1)) {
                redirect('admin');
            } else {
                $data['title'] = 'Home';
                //menampilkan semua data pengguna
                $this->db->select('id, name, email, image, role_id');
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                //menampilkan semua data produk
                $data['produk'] = $this->Produk_model->getProdukLimit();

                $this->load->view('templates/header', $data);
                $this->load->view('member/index', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }
    }

    public function profile()
    {

        if (($this->session->userdata('login')) == true) {
            if (($this->session->userdata('role_id') == 1)) {
                redirect('admin');
            } else {

                $data['title'] = 'Profile';
                $this->db->select('id, name, email, image, role_id, date_created');
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->model('Pemesanan_model');
                $data['pemesanan'] = $this->Pemesanan_model->getPemesananUser($data['user']['id']);

                $this->load->view('templates/header', $data);
                $this->load->view('member/profile', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }
    }

    public function profile3()
    {
        if (($this->session->userdata('login')) == true) {
            if (($this->session->userdata('role_id') == 1)) {
                redirect('admin');
            } else {

                $data['title'] = 'Profile';
                $this->db->select('id, name, email, image, role_id, date_created');
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->model('Pemesanan_model');
                $data['pemesanan'] = $this->Pemesanan_model->getPemesananMasuk($data['user']['id']);

                $this->load->view('templates/header', $data);
                $this->load->view('member/profile3', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }
    }

    public function profile2()
    {
        $this->check_login();

        $data['title'] = 'Profile';
        $this->db->select('id, name, email, image, role_id, date_created');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('User_produk_model');
        $data['produk'] = $this->User_produk_model->getProduk($data['user']['id']);

        // $coba = $data['user']['id'];
        // var_dump($coba);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('member/profile2', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $this->check_login();

        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('member/edit_profile', $data);
            $this->load->view('templates/footer');
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
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-4" role="alert">' . $error . '</div>');
                    redirect('member/profile');
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profile anda telah diperbarui!</div>');
            redirect('member/profile');
        }
    }

    public function change_password()
    {
        $this->check_login();

        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $test = $data['user']['password'];
        // echo var_dump($test);
        // die;

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('member/change_password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Currrent Password!</div>');
                redirect('member/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as currrent password!</div>');
                    redirect('member/change_password');
                } else {
                    $new_password_ = $new_password;

                    $this->db->set('password', $new_password_);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed!</div>');
                    redirect('member/change_password');
                }
            }
        }
    }

    private function check_login()
    {
        if (!$this->session->userdata("login")) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect(base_url("auth"));
            //kalo member mencoba masuk
        } else if (($this->session->userdata('role_id')) != 2) {
            redirect('admin');
        }
    }

    public function tambah_produk()
    {
        $this->check_login();

        $data['title'] = 'Tambah Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'numeric|required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('member/tambah_produk', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $id = $this->input->post('id');

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
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('member/profile2');
                }
            }

            $data_produk = [
                'id_penjual' => $id,
                'nama_produk' => $name,
                'harga' => $harga,
                'deskripsi' => $deskripsi,
            ];

            $this->db->insert('produk', $data_produk);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Produk Berhasil Ditambahkan!</div>');
            redirect('member/profile2');
        }
    }

    public function edit_produk($id)
    {
        $this->check_login();

        $data['title'] = 'Edit Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $this->load->model('User_produk_model');
        $data['produk'] = $this->User_produk_model->getProdukById($id);

        // $test = $data['produk']['id_produk'];
        // echo var_dump($test);
        // die;

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'numeric|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('member/edit_produk', $data);
            $this->load->view('templates/footer');
        } else {
            $id_produk = $data['produk']['id_produk'];
            $name = $this->input->post('name');
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
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('member/profile2');
                }
            }

            $this->db->set('deskripsi', $deskripsi);
            $this->db->set('harga', $harga);
            $this->db->set('nama_produk', $name);
            $this->db->where('id_produk', $id_produk);
            $this->db->update('produk');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Produk anda telah diperbarui!</div>');
            redirect('member/profile2');
        }
    }
}
