<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Menu_model', 'produk');

    }
    
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['Menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run()== false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else 
            {
                $this->db->insert('user_menu', ['menu'=> $this->input->post('menu')]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Menu Added!</div>');
                redirect('menu');
            }

    }

    public function daftar_produk()
    {
        $data['title'] = 'Menu Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();
        $this->load->helper(array('form', 'url'));

        $data['MenuProduk'] = $this->produk->menuproduk();

        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
        // $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        // $this->form_validation->set_rules('gambar', 'gambar', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else 
            {
                $gambar = $_FILES['gambar']['name'];

                $config['allowed_types'] = 'jpg|png|gif|jpeg';
                $config['max_size'] = '2048';
                $config['overwrite'] = true;
                $config['upload_path'] = './uploads/produk/';
                // $config['file_name'] = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);


                
                $this->load->library('upload' , $config);
                if ($this->upload->do_upload('gambar'))
                {
                    $gambar_produk = $this->upload->data('file_name');
                    $data= [
                        'nama_barang' => $this->input->post('nama_barang'),
                        'harga' => $this->input->post('harga'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'gambar' => $gambar_produk
                        // 'is_active' => $this->input->post('is_active')
                    ];
                    $this->db->insert('barang', $data); 
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Produk baru berhasil ditambahkan!</div>');
                    redirect('menu/daftar_produk');
                    
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Produk baru gagal ditambahkan!</div>');
                    redirect('menu/daftar_produk');
                }


            }

    }

    public function detail_produk($id)
    {
        $data['title'] = 'Detail Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();
        $data['DetailProduk'] = $this->produk->detail_produk($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/detail_produk', $data);
        $this->load->view('templates/footer');

    }

    public function hapus($id){
        $data = $this->produk->delete_produk($id);

        if ($data) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                    Data Berhasil Dihapus
            </div>');
            redirect('menu/daftar_produk');
        }else {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                    Data Gagal Dihapus
            </div>');
            redirect('menu/daftar_produk');
        }
    }

    

   
}
