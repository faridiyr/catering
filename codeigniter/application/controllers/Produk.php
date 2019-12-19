<?php

class Produk extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('login')) {
            redirect('auth');
        }
        $data['title'] = 'Daftar Produk';
        $data['produk'] = $this->Produk_model->getAllProduk();
        //kalau search dia bakal nampilin hasil search
        if ($this->input->post('keyword')) {
            $data['produk'] = $this->Produk_model->cariProduk();
        }

        $this->db->select('id, name, email, image, role_id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_produk)
    {
        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

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
        $this->db->select('name , email , image, id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['item'] = $this->Produk_model->getProdukById($id_produk);

        $data['title'] = 'Pemesanan Produk';

        $data['produk'] = $this->Produk_model->cariProduk();
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
        }
        redirect('produk');
        //tambahkan flashdata
    }
}
