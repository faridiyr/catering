<?php

class User_produk_model extends CI_model
{
    public function getProduk($id)
    {

        $this->db->select('produk.*');
        $this->db->from('produk');
        $this->db->join('user', 'user.id = produk.id_penjual');
        $this->db->order_by('produk.id_produk', "asc");
        if ($id) {
            $this->db->where('produk.id_penjual', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getProdukById($id)
    {
        return $this->db->get_where('produk', ["id_produk" => $id])->row_array();
    }
}
