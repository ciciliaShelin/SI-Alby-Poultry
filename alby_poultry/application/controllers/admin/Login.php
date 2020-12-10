<?php

class Login extends CI_Controller{

    public function index()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates_admin/header');
            $this->load->view('admin/login_admin');
            $this->load->view('templates_admin/footer');
        } else {
            $login = $this->model_login->cek_login();

            if ($login == FALSE)
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password Anda Salah!!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>');
              redirect('admin/login/index');
            }else {
                $this->session->set_userdata('username',$login->username);
                $this->session->set_userdata('role_id',$login->role_id);

                switch ($login->role_id){
                    case 1 : redirect('admin/dashboard_admin');
                             break;
                    default : break;
                }

            }
        }
        
        }
    
        public function logout(){
            $this->session->sess_destroy();
            redirect('admin/login/index');
        }
}