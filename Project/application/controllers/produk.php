<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Produk_model', 'product');

    }

    public function semuaproduk()
    {
        $data['title'] = 'Products';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

 
            $this->load->view('templates/shop_header', $data);
            // $this->load->view('shop/banner'); 
            $this->load->view('templates/shop_sidebar');
            $this->load->view('products/products');
            $this->load->view('templates/shop_footer');


    }

    public function detailproduk($id)
    {
        $data['title'] = 'Detail Produk';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();
        $data['Detailproduk'] = $this->product->detailproduk($id);

 
            $this->load->view('templates/shop_header', $data);
            // $this->load->view('shop/banner'); 
            $this->load->view('templates/shop_sidebar');
            $this->load->view('products/detailproduk', $data);
            $this->load->view('templates/shop_footer');

    }

    public function keranjang_belanja()
    {
        $data['title'] = 'Keranjang Belanja';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

 
            $this->load->view('templates/shop_header', $data);
            // $this->load->view('shop/banner'); 
            $this->load->view('templates/shop_sidebar');
            $this->load->view('products/keranjang_belanja');
            $this->load->view('templates/shop_footer');
    }
}
