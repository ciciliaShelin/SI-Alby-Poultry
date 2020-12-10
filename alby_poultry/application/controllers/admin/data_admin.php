<?php

class Data_admin extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if ($this->session->userdata('role_id') != '1'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
          redirect('admin/login/index');
        }
    }
    public function index ()
    {

        $data['admin']  = $this->model_admin->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_admin', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function tambah_aksi()
    {
        $username           = $this->input->post('username');
        $nama               = $this->input->post('nama');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $role_id            = $this->input->post('role_id');
        $gambar             = $_FILES ['gambar']['name'];
        if ($gambar=''){}else{
            $config ['upload_path'] = './upload';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "GAMBAR GAGAL DI UPLOAD!";
            }else {
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array (
            'username'      => $username,
            'nama'    => $nama,
            'email'         => $email,
            'password'      => $password,
            'role_id'       => $role_id,
            'gambar'        => $gambar,
        );

        $this->model_admin->tambah_admin($data, 'user');
        redirect ('admin/data_admin/index');
    }

    public function edit($id)
    {
        $where = array('id'=>$id);
        $data['admin'] = $this->model_admin->edit_admin($where,'user')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_admin', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
       
        $id                 = $this->input->post('id');
        $username           = $this->input->post('username');
        $nama               = $this->input->post('nama');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $role_id            = $this->input->post('role_id');
    

        $data = array (
            'username'      => $username,
            'nama'          => $nama,
            'email'         => $email,
            'password'      => $password,
            'role_id'       => $role_id,
        );
        $where = array(
            'id' => $id
        );
        $this->model_admin->update_data($where,$data, 'user');
        redirect ('admin/data_admin/index');
    }

    public function hapus($id){
        $where = array ('id'=> $id);
        $this->model_admin->hapus_data($where, 'user');
        redirect('admin/data_admin/index');
    }

}