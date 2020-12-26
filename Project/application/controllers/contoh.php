<?php
  class Shipping extends CI_Controller{
    public function __construct(){
      parent::__construct();

      $this->load->model('user/m_cart');
    }

    private $api_key = 'cari api key ya ? wkwkwkw';

    public function province(){

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: $this->api_key"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      $option = array();

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        // echo json_encode($response
        $data = json_decode($response, true);
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
          array_push($option, array(
            'id_province' => $data['rajaongkir']['results'][$i]['province_id'],
            'province' => $data['rajaongkir']['results'][$i]['province'])
          );
        }
        echo json_encode($option);
      }
    }

    public function country_db(){
      $al = $this->m_cart->cek_api('country');

      $option = array();
      foreach ($al as $key) {
        array_push($option, array(
          'id_country' => $key->id,
          'country' => $key->negara,
          'code' => $key->kode
        ));
      }
      echo json_encode($option);
    }

    public function country(){
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/basic/v2/internationalDestination",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: $this->api_key"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      $option = array();

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        // echo json_encode($response);
        // echo $response;
        $data = json_decode($response, true);
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
          array_push($option, array(
            'id_country' => $data['rajaongkir']['results'][$i]['country_id'],
            'country' => $data['rajaongkir']['results'][$i]['country_name'])
          );
        }
        echo json_encode($option);
      }
    }

    public function indestination(){
      $id_country = $this->input->post('id_country');

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/basic/v2/internationalDestination?id=".$id_country,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: $this->api_key"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      $city = array();

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
        // $data = json_decode($response, true);
        // for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
        //   array_push($city, array(
        //     'city_id' => $data['rajaongkir']['results'][$i]['city_id'],
        //     'type' => $data['rajaongkir']['results'][$i]['type'],
        //     'city_name' => $data['rajaongkir']['results'][$i]['city_name'])
        //   );
        // }
        // echo json_encode($city);
      }
    }

    public function city(){
      $id_province = $this->input->post('id_province');

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_province,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: $this->api_key"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      $city = array();

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        // echo $response;
        $data = json_decode($response, true);
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
          array_push($city, array(
            'city_id' => $data['rajaongkir']['results'][$i]['city_id'],
            'type' => $data['rajaongkir']['results'][$i]['type'],
            'city_name' => $data['rajaongkir']['results'][$i]['city_name'])
          );
        }
        echo json_encode($city);
      }
    }

    public function origin(){
      $id_province = $this->input->post('id_province');

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/basic/v2/internationalOrigin?province=".$id_province,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: $this->api_key"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      $city = array();

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
        // $data = json_decode($response, true);
        // for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
        //   array_push($city, array(
        //     'city_id' => $data['rajaongkir']['results'][$i]['city_id'],
        //     'type' => $data['rajaongkir']['results'][$i]['type'],
        //     'city_name' => $data['rajaongkir']['results'][$i]['city_name'])
        //   );
        // }
        // echo json_encode($city);
      }
    }

    public function kurir_in(){

      $asal = '114';
      $dest =  $this->input->post('dest');
      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/basic/v2/internationalCost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$dest."&weight=1500&courier=pos",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $this->api_key"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }

    public function ongkir_in(){
      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/basic/v2/internationalCost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=152&destination=108&weight=1400&courier=pos",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $this->api_key"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $ongkir = array();

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          // echo $response;
          $data = json_decode($response, true);
          for ($i=0; $i < count($data['rajaongkir']['results'][0]['costs']); $i++) {
            $usd = $this->convert();
            $cos = $data['rajaongkir']['results'][0]['costs'][$i]['cost'];
            $cas = $usd*$cos;
            array_push($ongkir, array(
              'service' => $data['rajaongkir']['results'][0]['costs'][$i]['service'],
              'cost' => number_format($cas)
             )
           );
        }
        echo json_encode($ongkir);
    }
  }
    public function cek_ongkir(){

       $kurir = $this->input->post('kurir');
       $asal = '114';
       $city =  $this->input->post('city');
       if ($city == null) {
         $id = $this->session->userdata('id');
         $where = array(
           'id_user'=>$id
         );
         $data = $this->m_cart->cek_apa('tabel_alamat', $where);
         foreach ($data as $key) {
           $city = $key->id_kota;
         }
       }
       $berat = '1000';

       $curl = curl_init();
       curl_setopt_array($curl, array(
       CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 30,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "POST",
       CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$city."&weight=".$berat."&courier=".$kurir."",
       CURLOPT_HTTPHEADER => array(
           "content-type: application/x-www-form-urlencoded",
           "key:$this->api_key"
         ),
       ));
       $response = curl_exec($curl);
       $err = curl_error($curl);

       curl_close($curl);
       $ongkir =array();

       if ($err) {
       echo "cURL Error #:" . $err;
       } else {

       $data = json_decode($response, true);
       for ($i=0; $i < count($data['rajaongkir']['results'][0]['costs']); $i++) {
         $usd = $this->convert();
         $cos = $data['rajaongkir']['results'][0]['costs'][$i]['cost'][0]['value'];
         $cas = $usd*$cos;
         array_push($ongkir, array(
           'service' => $data['rajaongkir']['results'][0]['costs'][$i]['service'],
           'cost' => number_format($cas)
          )
        );
       }
       echo json_encode($ongkir);
     }

    }


    public function convert(){
      $ch = curl_init();

      curl_setopt_array($ch, array(
        CURLOPT_URL => "https://api.exchangeratesapi.io/latest?base=IDR",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET"
      ));
      $response = curl_exec($ch);
      $error = curl_error($ch);
      curl_close($ch);
      if ($error) {
        echo "cURL Error #:" . $error;
      }else {
        $data = json_decode($response, true);
        return $data['rates']['USD'];
      }
    }

    public function set_ship_session(){
      $cost = $this->input->post('cost');
      $method = $this->input->post('method');
      $address_line_1 = $this->input->post('a1');
      // $address_line_2 = $this->input->post('a2');
      $admin_area_2 = $this->input->post('a3');
      $admin_area_1 = $this->input->post('a4');
      $postal_code = $this->input->post('a5');
      $country_code = $this->input->post('a6');

      $_SESSION['ship_session'] = array(
        'cost' => $cost,
        'method' => $method,
        'address_line_1' => $address_line_1,
        // 'address_line_2' => $address_line_2,
        'admin_area_2' => $admin_area_2,
        'admin_area_1' => $admin_area_1,
        'postal_code' => $postal_code,
        'country_code' => $country_code,
      );
    }

  }
 ?>