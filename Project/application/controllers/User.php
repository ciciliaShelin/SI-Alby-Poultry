<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'My Profile';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        // $data['user']=$this->session->userdata('email');


        // $data = 
        // [
        //     $email = $this->input->post('email'),
        //     $password = $this->input->post('password'),
        //     $user =  $this->db->get_where('user', ['email' => $email])->row_array()

        // ];
        // $data['userr']=$this->session->set_userdata($data);


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
