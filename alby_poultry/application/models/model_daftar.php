<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 
  class Model_daftar extends CI_Model{

       function daftar($data)
       {
            $this->db->insert('pembeli',$data);
       }
  }