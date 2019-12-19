<?php

class Produk extends CI_Controller
{
    public function index()
    {
        $this->check_loginmember();
        $data['title'] = 'Daftar Produk';
        $this->db->select('id');
        $id_penjual = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // echo var_dump($id_penjual['id']);
        // die;
        $data['produk'] = $this->Produk_model->getAllProdukExceptPenjual($id_penjual['id']);
        //kalau search dia bakal nampilin hasil search
        if ($this->input->get('keyword')) {
            $data['produk'] = $this->Produk_model->cariProduk($id_penjual);
        }

        $this->db->select('id, name, email, image, role_id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function check_loginmember()
    {
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        } elseif (($this->session->userdata('role_id')) != 2) {
            redirect('admin');
        }
    }

    public function detail($id_produk)
    {
        // if (!$this->session->userdata('login')) {
        //     redirect('auth');
        // }

        $this->check_loginmember();

        $this->db->select('id, name, email, image, role_id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Detail Produk';
        $data['produk'] = $this->Produk_model->getProdukById($id_produk);
        $this->load->view('templates/header', $data);
        $this->load->view('produk/detail', $data);
        $this->load->view('templates/footer');
    }

    //edit minggu pagi - add item
    public function tambahPemesanan($id_produk)
    {
        $this->check_loginmember();

        $this->db->select('name , email , image, id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['item'] = $this->Produk_model->getProdukById($id_produk);

        $data['title'] = 'Pemesanan Produk';

        //jika menginput nilai
        if ($this->input->post('jumlah')) {

            $jumlah = $this->input->post('jumlah');

            $data_produk = [
                'id_pembeli' => $data['user']['id'],
                'id_produk' => $data['item']['id_produk'],
                'jumlah' => $jumlah,
                'total_harga' => $data['item']['harga'] * $jumlah,
                'tanggal_pemesanan' => time(),
                'status_pemesanan' => 1
            ];
            $this->db->insert('pemesanan', $data_produk);
            $this->session->set_flashdata('flash', 'selamat ');
            redirect('member/profile');
        }
        redirect('produk');
        //tambahkan flashdata
    }
}
