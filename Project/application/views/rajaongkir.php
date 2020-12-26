<?php

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
    "key: 874b5ec41d9092886a1686cf8530ad96"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $provinsi = json_decode($response, true);
}

?>

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?= base_url('auth'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active"> <?= $title; ?></li>
    </ul>
	<h3>  <?= $title; ?> <a href="<?= base_url('produk/semuaproduk'); ?>" class="btn pull-right"><i class="icon-arrow-left"></i> Lanjutkan Belanja </a></h3>	
	<hr class="soft"/>


    <div class="well">
        <div class="row">
        <h4 style="padding-left:30px;">Alby Poultry</h4> <br>
            <div class="span2.5">
                <form>
        
                    <div class="form-group">
                        <select id="provinsi" name="provinsi" class="form-control" id="exampleFormControlSelect1">
                        <option value="">Pilih Provinsi</option>
                        <?php 
                        if($provinsi['rajaongkir']['status']['code'] == '200') 
                        {
                            foreach($provinsi['rajaongkir']['results'] as $pv)
                            {
                                echo "<option value= '$pv[province_id]'>$pv[province]</option> ";
                            }    
                        }
                        ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="span4">
                    <form action="">
                        <div class="form-group">
                            <select id="kota" name="kota" class="form-control" id="exampleFormControlSelect1">
                            <option>Pilih Provinsi dahulu</option>
                            
                            </select>
                        </div>
                    </form>
                </div>
        </div>
    </div>





    <div class="well">
        <div class="row">
        <h4 style="padding-left:30px;">Alamat Penerima</h4> <br>
            <div class="span4">
                <form>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Provinsi Penerima</label>
                        <select id="provinsi_penerima" name="provinsi_penerima" class="form-control" id="exampleFormControlSelect1">
                        <option value="">Pilih Provinsi</option>
                        <?php 
                        if($provinsi['rajaongkir']['status']['code'] == '200') 
                        {
                            foreach($provinsi['rajaongkir']['results'] as $pv)
                            {
                                echo "<option value= '$pv[province_id]'>$pv[province]</option> ";
                            }    
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kota Penerima</label>
                        <select id="kota_penerima" name="kota_penerima" class="form-control" id="exampleFormControlSelect1">
                        <option>Pilih Provinsi dahulu</option>
                      
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>

                </form>
                
            </div>

        </div>
    </div>

 </div>	
</div></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
    document.getElementById('provinsi').addEventListener('change', function(){
        fetch("<?= base_url('rajaongkir/kota/') ?>"+this.value, {
            method:"GET",
        })
        .then((response)=> response.text())
        .then((data)=> {
            console.log(data)
            document.getElementById('kota').innerHTML = data
        })
    })
</script>