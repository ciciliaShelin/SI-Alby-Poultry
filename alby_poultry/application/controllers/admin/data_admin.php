<?php

class Data_admin extends CI_Controller {
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
        $nama_admin         = $this->input->post('nama_admin');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $alamat_admin       = $this->input->post('alamat_admin');
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
            'nama_admin'    => $nama_admin,
            'email'         => $email,
            'password'      => $password,
            'alamat_admin'  => $alamat_admin,
            'gambar'        => $gambar,
        );

        $this->model_admin->tambah_admin($data, 'admin');
        redirect ('admin/data_admin/index');
    }

    public function edit($id)
    {
        $where = array('id_admin'=>$id);
        $data['admin'] = $this->model_admin->edit_admin($where,'admin')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_admin', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
       
        $id                 = $this->input->post('id_admin');
        $username           = $this->input->post('username');
        $nama_admin         = $this->input->post('nama_admin');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $alamat_admin       = $this->input->post('alamat_admin');
    

        $data = array (
            'username'      => $username,
            'nama_admin'    => $nama_admin,
            'email'         => $email,
            'password'      => $password,
            'alamat_admin'  => $alamat_admin,
        );
        $where = array(
            'id_admin' => $id
        );
        $this->model_admin->update_data($where,$data, 'admin');
        redirect ('admin/data_admin/index');
    }

    public function hapus($id){
        $where = array ('id_admin'=> $id);
        $this->model_admin->hapus_data($where, 'admin');
        redirect('admin/data_admin/index');
    }

}