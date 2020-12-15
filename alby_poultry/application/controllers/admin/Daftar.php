<?php

class Daftar extends CI_Controller{
 
	public function index(){
        $this->form_validation->set_rules('nama', 'Nama','required');
        $this->form_validation->set_rules('username', 'Username','required');
        $this->form_validation->set_rules('no_tlp', 'No_tlp','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password_1','Password','required|matches[password_2]');
        $this->form_validation->set_rules('password_2','Password','required|matches[password_1]');


        if($this->form_validation->run() == FALSE){
		$this->load->view('templates_admin/header');
        $this->load->view('admin/daftar_admin');
        $this->load->view('templates_admin/footer');
        } else {

            $data = array (
                'id'                => '',
                'nama'              => $this->input->post('nama'),
                'username'          => $this->input->post('username'),
                'no_tlp'           => $this->input->post('no_tlp'),
                'email'             => $this->input->post('email'),
                'password'          => $this->input->post('password_1'),
                'role_id'           => 1,
            );

            $this->db->insert('user', $data);
            redirect('admin/login/index');
        }
    }
}