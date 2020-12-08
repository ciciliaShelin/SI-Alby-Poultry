<?php

class Data_barang extends CI_Controller {
    public function index ()
    {

        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function tambah_aksi()
    {
        $nama_barang    = $this->input->post('nama_barang');
        $deskripsi      = $this->input->post('deskripsi');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $gambar_brg     = $_FILES ['gambar_brg']['name'];
        if ($gambar_brg=''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';
           

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar_brg')){
                echo "GAMBAR GAGAL DI UPLOAD!";
            }else {
                $gambar_brg=$this->upload->data('file_name');
            }
        }
        $data = array (
            'nama_barang'   => $nama_barang,
            'deskripsi'     => $deskripsi,
            'harga'         => $harga,
            'stok'          => $stok,
            'gambar_brg'    => $gambar_brg,
        );

        $this->model_barang->tambah_barang($data, 'barang');
        redirect ('admin/data_barang/index');
    }

    public function edit($id)
    {
        $where = array('id_barang'=>$id);
        $data['barang'] = $this->model_barang->edit_barang($where,'barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $id                 = $this->input->post('id_barang');
        $nama_barang        = $this->input->post('nama_barang');
        $deskripsi          = $this->input->post('deskripsi');
        $harga              = $this->input->post('harga');
        $stok               = $this->input->post('stok');

        $data = array (
            'nama_barang'   => $nama_barang,
            'deskripsi'     => $deskripsi,
            'harga'         => $harga,
            'stok'          => $stok,
        );
        $where = array(
            'id_barang' => $id
        );
        $this->model_barang->update_data($where,$data, 'barang');
        redirect ('admin/data_barang/index');
    }

    public function hapus($id){
        $where = array ('id_barang'=> $id);
        $this->model_barang->hapus_data($where, 'barang');
        redirect('admin/data_barang/index');
    }

}