<?php

class About extends CI_Controller
{

    public function index()
    {
        if (($this->session->userdata('role_id')) != 2) {
            redirect('auth');
        }
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('about/index');
        $this->load->view('templates/footer');
    }
}
