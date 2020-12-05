<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Registrasi extends CI_Controller
{
 public function index()
    {
        $data['title'] = 'My Profile';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == true) {
            $data['title'] = 'Alby Pultry';
            $this->load->view('templates/shop_header_registrasi', $data);
            $this->load->view('shop/banner'); 
            $this->load->view('templates/shop_sidebar');
            $this->load->view('shop/produk');
            $this->load->view('templates/shop_footer');
        }else {
            redirect('auth/login');
        }

    }
}