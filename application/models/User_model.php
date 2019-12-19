<?php
class User_model extends CI_Model
{


    public function getUser($id = null)
    {
        $this->db->select('user.*, user_role.role AS level');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    // public function getUserById($id)
    // {
    // 	return $this->db->get_where('user', 'id'=>$id)->row_array();
    // }

    public function input_data($data)
    {
        $this->db->insert('user', $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function userEdit($id, $name, $email, $role_id)
    {
        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('role_id', $role_id);
        $this->db->where('id', $id);
        return $this->db->update('user');
    }

    public function getUserRole()
    {
        $this->db->select('*');
        $this->db->from('user_role');
        return $this->db->get()->result_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
}
