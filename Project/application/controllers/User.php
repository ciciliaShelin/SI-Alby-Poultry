<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('selling/header', $data);
        $this->load->view('selling/product', $data);
        $this->load->view('selling/about_us', $data);
        $this->load->view('selling/promo', $data);
        $this->load->view('user/index', $data);
        $this->load->view('selling/contact', $data);
        $this->load->view('selling/footer');
    }
}
