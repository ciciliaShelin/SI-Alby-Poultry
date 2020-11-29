<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/template/header', $data);
        $this->load->view('templates/template/product', $data);
        $this->load->view('templates/template/about_us', $data);
        $this->load->view('templates/template/promo', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/template/contact', $data);
        $this->load->view('templates/template/footer');
    }
}
