<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{


    public function semuaproduk()
    {
        $data['title'] = 'Products';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

 
            $this->load->view('templates/shop_header', $data);
            // $this->load->view('shop/banner'); 
            $this->load->view('templates/shop_sidebar');
            $this->load->view('products/products');
            $this->load->view('templates/shop_footer');


    }

    public function detailproduk()
    {
        $data['title'] = 'Detail Produk';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

 
            $this->load->view('templates/shop_header', $data);
            // $this->load->view('shop/banner'); 
            $this->load->view('templates/shop_sidebar');
            $this->load->view('products/detailproduk');
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
