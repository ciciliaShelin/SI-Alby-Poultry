<?php

 class Model_pembeli extends CI_Model{
     public function tampil_data(){
         return $this->db->get('pembeli');
     }
     public function tambah_pembeli ($data,$table){
         $this->db->insert($table,$data);
     }
     public function edit_pembeli($where,$table){
         return $this->db->get_where($table,$where);
     }
     public function update_data($where,$data, $table){
         $this->db->where($where);
         $this->db->update($table,$data);
     }
     public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }
 }
?>