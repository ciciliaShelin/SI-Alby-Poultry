<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_Model
{
    public function daftar_user()
    {
        $query = "SELECT * FROM user ";
        return $this->db->query($query)->result_array();
    }

    public function detail_user($id)
    {
        return $this->db->get_where("user", ['id_user' => $id])->result_array();
    }
}