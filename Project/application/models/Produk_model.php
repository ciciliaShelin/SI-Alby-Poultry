<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Produk_model extends CI_Model
{


    public function delete_produk($id)
    {
        $query = "SELECT * FROM barang ";
        $this->load->database($query);
        $this->db->where('id_barang', $id);
        return $this->db->delete('barang');  
    }

    public function detailproduk($id)
    {
        return $this->db->get_where("barang", ['id_barang' => $id])->result_array();
    }
}