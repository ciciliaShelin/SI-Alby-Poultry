<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Proses Checkout';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $this->load->view('templates/shop_header', $data);
        $this->load->view('templates/shop_sidebar');
        $this->load->view('rajaongkir');
        $this->load->view('templates/shop_footer');
    }

    public function kota($provinsi)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 874b5ec41d9092886a1686cf8530ad96"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        $kota = json_decode($response, true);

        if($kota['rajaongkir']['status']['code'] == '200')
        {
            echo "<option value=''>Pilih Kota</option> ";
            foreach($kota['rajaongkir']['results'] as $kt)
            {
                echo "<option value= '$kt[city_id]'>$kt[city_name]</option>"; 
            }
        }
        }
    }

}