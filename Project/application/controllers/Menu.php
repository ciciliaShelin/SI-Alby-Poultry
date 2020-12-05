<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
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

    public function submenu()
    {
        $data['title'] = 'Menu Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();
        $data['Jenis'] = $this->db->get('jenis_barang')->result_array();

        $this->load->model('Menu_model', 'produk');
        $data['MenuProduk'] = $this->produk->menuproduk();

        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
        $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('gambar', 'gambar', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else 
            {
                $data= [
                    'nama_barang' => $this->input->post('nama_barang'),
                    'jenis_id' => $this->input->post('jenis_id'),
                    'harga' => $this->input->post('harga'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $this->input->post('gambar')
                    // 'is_active' => $this->input->post('is_active')
                ];
                $this->db->insert('barang', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Produk baru berhasil ditambahkan!</div>');
                redirect('menu/submenu');
            }

    }

    

   
}
