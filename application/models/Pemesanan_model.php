<?php

class Pemesanan_model extends CI_model
{
    public function getPemesananUser($id)
    {

        $this->db->select('pemesanan.*, produk.nama_produk AS nama_produk, pemesanan_status.status AS status_pemesanan');
        $this->db->from('pemesanan');
        $this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
        $this->db->join('user', 'user.id = pemesanan.id_pembeli');
        $this->db->join('pemesanan_status', 'pemesanan_status.id_status = pemesanan.status_pemesanan');
        $this->db->order_by('pemesanan.id_pemesanan', "asc");
        if ($id) {
            $this->db->where('pemesanan.id_pembeli', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getPemesanan($id = null)
    {
        $this->db->select('pemesanan.*, produk.nama_produk AS nama_produk, user.name as nama_pembeli, pemesanan_status.status as status_pemesanan');
        $this->db->from('pemesanan');
        $this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
        $this->db->join('user', 'user.id = pemesanan.id_pembeli');
        $this->db->join('pemesanan_status', 'pemesanan_status.id_status = pemesanan.status_pemesanan');
        $this->db->order_by('pemesanan.tanggal_pemesanan', "asc");
        if ($id != null) {
            $this->db->where('id_pemesanan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getPemesananMasuk($id)
    {
        $this->db->select('pemesanan.*, produk.nama_produk AS nama_produk, user.name as nama_pembeli, pemesanan_status.status as status_pemesanan');
        $this->db->from('pemesanan');
        $this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
        $this->db->join('user', 'user.id = pemesanan.id_pembeli');
        $this->db->join('pemesanan_status', 'pemesanan_status.id_status = pemesanan.status_pemesanan');
        $this->db->order_by('pemesanan.tanggal_pemesanan', "asc");
        $this->db->where('id_penjual', $id);
        $query = $this->db->get();
        return $query;
    }

    public function addPemesanan($data)
    {
        $this->db->insert('pemesanan', $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function pemesananEdit($id_pemesanan, $id_produk, $id_pembeli, $jumlah, $total_harga, $tanggal_pemesanan)
    {
        $this->db->set('id_produk', $id_produk);
        $this->db->set('id_pembeli', $id_pembeli);
        $this->db->set('jumlah', $jumlah);
        $this->db->set('total_harga', $total_harga);
        $this->db->set('tanggal_pemesanan', $tanggal_pemesanan);
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->update('pemesanan');
    }

    public function getProduk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result_array();
    }

    public function getPembeli()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result_array();
    }

    public function getPemesananById($id_pemesanan)
    {
        return $this->db->get_where('pemesanan', ['id_pemesanan' => $id_pemesanan])->row_array();
    }

    public function selesaiPemesanan($id_pemesanan)
    {

        $this->db->set('status_pemesanan', 2);
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->update('pemesanan');
    }
}
