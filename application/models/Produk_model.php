<?php

class Produk_model extends CI_model
{
    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }

    public function getAllProdukExceptPenjual($id_penjual)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('user', 'user.id = produk.id_penjual');
        $this->db->where_not_in('user.id', $id_penjual);
        return $this->db->get()->result_array();
    }

    public function getProdukLimit()
    {
        return $this->db->get('produk', 3, 0)->result_array();
    }

    public function getProdukById($id_produk)
    {
        return $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
    }

    public function cariProduk($id_penjual)
    {
        $keyword = $this->input->get('keyword');
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('user', 'user.id = produk.id_penjual');
        $this->db->where_not_in('user.id', $id_penjual);
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        return $this->db->get()->result_array();
    }


    //menambah 1 pesanan ke tabel pemesanan
    public function tambahPemesanan($data)
    {
        $this->db->insert('pemesanan', $data);
    }

    public function getProduk($id = null)
    {
        $this->db->select('produk.*, user.name as nama_penjual');
        $this->db->from('produk');
        $this->db->join('user', 'user.id = produk.id_penjual');
        if ($id != null) {
            $this->db->where('id_produk', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getPenjualById($id_produk)
    {
        $this->db->select('user.id, user.name');
        $this->db->from('produk');
        $this->db->join('user', 'user.id = produk.id_penjual');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->row_array();
    }

    public function getHargaById($id_produk)
    {
        $this->db->select('harga');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->row_array();
    }

    public function input_data($data)
    {
        $this->db->insert('produk', $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table); //belum nampilin produk gagal dihapus
    }

    public function deleteProduk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        return $this->db->delete('produk');
    }

    public function produkEdit($id_produk, $nama_produk, $id_penjual, $harga, $deskripsi)
    {
        $this->db->set('nama_produk', $nama_produk);
        $this->db->set('id_penjual', $id_penjual);
        $this->db->set('harga', $harga);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->where('id_produk', $id_produk);
        return $this->db->update('produk');
    }

    public function getPenjual()
    {
        $this->db->select('id, name');
        $this->db->from('user');
        return $this->db->get()->result_array();
    }
}
