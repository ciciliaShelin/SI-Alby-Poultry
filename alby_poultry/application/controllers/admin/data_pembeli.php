<?php

class Data_pembeli extends CI_Controller {
    public function index ()
    {

        $data['pembeli'] = $this->model_pembeli->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_pembeli', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function tambah_aksi()
    {
        $nama_pembeli       = $this->input->post('nama_pembeli');
        $no_tlp             = $this->input->post('no_tlp');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $alamat             = $this->input->post('alamat');
        $pas_foto           = $_FILES ['pas_foto']['name'];
        if ($pas_foto=''){}else{
            $config ['upload_path'] = './upload';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('pas_foto')){
                echo "GAMBAR GAGAL DI UPLOAD!";
            }else {
                $pas_foto=$this->upload->data('file_name');
            }
        }
        $data = array (
            'nama_pembeli'   => $nama_pembeli,
            'no_tlp'         => $no_tlp,
            'email'          => $email,
            'password'       => $password,
            'alamat'         => $alamat,
            'pas_foto'       => $pas_foto,
           
        );

        $this->model_pembeli->tambah_pembeli($data, 'pembeli');
        redirect ('admin/data_pembeli/index');
    }

    public function edit($id)
    {
        $where = array('id_pembeli'=>$id);
        $data['pembeli'] = $this->model_pembeli->edit_pembeli($where,'pembeli')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_pembeli', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $id                 = $this->input->post('id_pembeli');
        $nama_pembeli       = $this->input->post('nama_pembeli');
        $no_tlp             = $this->input->post('no_tlp');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $alamat             = $this->input->post('alamat');


        $data = array (
            'nama_pembeli'   => $nama_pembeli,
            'no_tlp'         => $no_tlp,
            'email'          => $email,
            'password'       => $password,
            'alamat'         => $alamat
        );
        $where = array(
            'id_pembeli' => $id
        );
        $this->model_pembeli->update_data($where,$data, 'pembeli');
        redirect ('admin/data_pembeli/index');
    }

    public function hapus($id){
        $where = array ('id_pembeli'=> $id);
        $this->model_pembeli->hapus_data($where, 'pembeli');
        redirect('admin/data_pembeli/index');
    }

}