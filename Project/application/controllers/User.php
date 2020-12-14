<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'produk');
        
    }


    public function index()
    {
        $data['title'] = 'My Profile';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Alby Pultry';

            $this->load->view('templates/shop_header', $data);
            $this->load->view('shop/banner');
            $this->load->view('templates/shop_sidebar');
            $this->load->view('shop/produk');
            $this->load->view('templates/shop_footer');
        } else {
            redirect('auth/login');
        }
    }


}
