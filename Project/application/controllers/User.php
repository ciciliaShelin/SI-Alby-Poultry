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

    public function daftar_user()
    {
        $data['title'] = 'List User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['User'] = $this->db->get('user')->result_array();

        $data['DaftarUser'] = $this->produk->daftar_user();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/list_user', $data);
        $this->load->view('templates/footer');
       
    }

    public function detail_user($id)
    {
        $data['title'] = 'Detail User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();

        $data['DetailUser'] = $this->produk->detail_user($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/detail_user', $data);
        $this->load->view('templates/footer');
    }
}
