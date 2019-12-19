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
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }

        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //menampilkan semua data produk
        $data['produk'] = $this->Produk_model->getProdukLimit();

        $this->load->view('templates/header', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }

        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('member/profile', $data);
        $this->load->view('templates/footer');
    }

    public function profile2()
    {
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }

        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('member/profile2', $data);
        $this->load->view('templates/footer');
    }

    public function profile3()
    {
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }

        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('member/profile3', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }

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
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profile anda telah diperbarui!</div>');
            redirect('member/profile');
        }
    }

    // public function change_password()
    // {
    //     if (!$this->session->userdata('login')) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
    //         redirect('auth');
    //     }

    //     $data['title'] = 'Change Password';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    //     $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
    //     $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('member/change_password', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $current_password = $this->input->post('current_password');
    //         $new_password = $this->input->post('new_password1');
    //         if (!password_verify($current_password, $data['user']['password'])) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Currrent Password!</div>');
    //             redirect('member/change_password');
    //         } else {
    //             if ($current_password == $new_password) {
    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as currrent password!</div>');
    //                 redirect('member/change_password');
    //             } else {
    //                 $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    //                 $this->db->set('password', $password_hash);
    //                 $this->db->where('email', $this->session->userdata('email'));
    //                 $this->db->update('user');

    //                 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed!</div>');
    //                 redirect('member/change_password');
    //             }
    //         }
    //     }
    // }

    public function tambah_produk()
    {
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }

        $data['title'] = 'Tambah Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('member/tambah_produk', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $price = $this->input->post('price');
            $deskripsi = $this->input->post('deskripsi');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/produk/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama_produk', $name);
            $this->db->set('harga', $price);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->where('email', $email);
            $this->db->update('produk');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Produk Berhasil Ditambahkan!</div>');
            redirect('member/tambah_produk');
        }
    }
}
