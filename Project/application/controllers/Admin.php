<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'produk');
        apakah_sudah_login();
    }

    

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
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

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if($this->form_validation->run()== false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_profile', $data);
            $this->load->view('templates/footer');
        }else
            {
                $name = $this->input->post('name');
                $email = $this->input->post('email');

                //cek jika ada gambar yang akan diupload
                $upload_image= $_FILES['image'] ['name'];

                if($upload_image) {
                    $config['allowed_types'] = 'jpg|png|gif|jpeg';
                    $config['max_size'] = '2048';
                    $config['overwrite'] = true;
                    $config['upload_path'] = './uploads/profile/';
                    $this->load->library('upload', '$config');


                    if($this->upload->do_upload('image')) {
                        $old_image= $data['user'] ['image'];
                        if($old_image != 'default.jpg') {
                            unlink(FCPATH. 'uploads/profile/' . $old_image);
                        }
                        $new_image= $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                $this->db->set('name', $name);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Your account has been updated!</div>');
                redirect('admin/edit');
            }

    }
}
