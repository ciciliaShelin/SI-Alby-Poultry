<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT user_sub_menu.*, user_menu.menu
                    FROM user_sub_menu JOIN user_menu
                      ON user_sub_menu.menu_id = user_menu.id
                ";
        return $this->db->query($query)->result_array();
        
    }

    public function menuproduk()
    {
        $query = "SELECT * FROM barang ";
        return $this->db->query($query)->result_array();
    }

    public function delete_produk($id)
    {
        $query = "SELECT * FROM barang ";
        $this->load->database($query);
        $this->db->where('id_barang', $id);
        return $this->db->delete('barang');  
    }

    public function detail_produk($id)
    {
        return $this->db->get_where("barang", ['id_barang' => $id])->result_array();
    }
}