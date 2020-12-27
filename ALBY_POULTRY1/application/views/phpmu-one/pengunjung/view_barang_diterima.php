<p class='sidebar-title'>Konfirmasi Barang Pesanan Status Diterima</p>
<?php 
if ($total['proses']=='0'){ $proses = '<i class="text-danger">Pending</i>'; }elseif($total['proses']=='1'){ $proses = '<i class="text-warning">Proses</i>'; }elseif($total['proses']=='2'){ $proses = '<i class="text-info">Konfirmasi</i>'; }else{ $proses = '<i class="text-success">Packing </i>'; }
  echo "<div class='col-md-7'>
        <dl class='dl-horizontal'>
            <dt>Nama</dt>       <dd>$rows[nama_lengkap]</dd>
            <dt>No Telpon/Hp</dt>       <dd>$rows[no_hp]</dd>
            <dt>Email</dt>       <dd>$rows[email]</dd>
            <dt>Kota</dt>               <dd>$rows[nama_kota]</dd>
            <dt>Alamat Lengkap</dt>     <dd>$rows[alamat_lengkap]</dd>
        </dl>
    </div>

    <div class='col-md-5'>
        <center>
        Total Tagihan 
        <h4 style='margin:0px;'>Rp ".rupiah($total['total']+$total['ongkir']+substr($kode_transaksi,-3))."<br> <br> ";
        if ($total['resi']!=''){
          echo "<span style='color:red; font-size:14px'>No Resi : <b>$total[resi]</b></span><br>";
        }else{
          echo "<span style='color:red; font-size:14px'>No Resi : <b>-</b></span><br>";
        }
        echo "<span style='text-transform:uppercase'>$total[kurir]</span> ($total[service])
        </h4>
        Status : <i>$proses</i>   
        </center>
    </div>

      <table class='table table-striped table-condensed '>
          <thead>
            <tr bgcolor='#e3e3e3'>
              <th width='47%'>Nama Produk</th>
              <th>Harga</th>
              <th>Qty</th>
              <th>Berat</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>";

          $no = 1;
          $diskon_total = 0;
          foreach ($record->result_array() as $row){
          $sub_total = (($row['harga_jual']-$row['diskon'])*$row['jumlah']);
          if ($row['diskon']!='0'){ $diskon = "<del style='color:red'>".rupiah($row['harga_jual'])."</del>"; }else{ $diskon = ""; }
          if (trim($row['gambar'])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $row['gambar']; }
          $diskon_total = $diskon_total+$row['diskon']*$row['jumlah'];
          echo "<tr>
                    <td class='valign'><a href='".base_url()."produk/detail/$row[produk_seo]'>$row[nama_produk]</a><br>
                    <small>Note : $row[keterangan_order]</small></td>
                    <td class='valign'>".rupiah($row['harga_jual']-$row['diskon'])." $diskon</td>
                    <td class='valign'>$row[jumlah]</td>
                    <td class='valign'>".($row['berat']*$row['jumlah'])." Gram</td>
                    <td class='valign'>Rp ".rupiah($sub_total)."</td>
                </tr>";
            $no++;
          }
          
          echo "<tr class='success'>
                  <td colspan='4'><b>Subtotal </b> <i class='pull-right'>(".terbilang($total['total'])." Rupiah)</i></td>
                  <td><b>Rp ".rupiah($total['total'])."</b></td>
                </tr>

                <tr class='success'>
                  <td colspan='4'><b>Ongkir </b> <i class='pull-right'>(".terbilang($total['ongkir'])." Rupiah)</i></td>
                  <td><b>Rp ".rupiah($total['ongkir'])."</b></td>
                </tr>

                <tr class='success'>
                  <td colspan='4'><b>Berat</b> <i class='pull-right'>(".terbilang($total['total_berat'])." Gram)</i></td>
                  <td><b>$total[total_berat] Gram</b></td>
                </tr>

        </tbody>
      </table><br>";

      echo "<a hidden>Silahkan mentransferkan uang dengan total <b>Rp ".rupiah($total['total']+$total['ongkir']+substr($kode_transaksi,-3))."</b> ke salah satu pilihan bank di bawah ini : <br> </a>
      <table hidden class='table table-hover table-condensed table-bordered'>
        <thead>
          <tr bgcolor='#e3e3e3'>
            <th width='20px'>No</th>
            <th>Nama Bank</th>
            <th>No Rekening</th>
            <th>Atas Nama</th>
          </tr>
        </thead>
        <tbody>";

            $noo = 1;
            $rekening = $this->model_app->view('rb_rekening');
            foreach ($rekening->result_array() as $row){
            echo "<tr><td>$noo</td>
                      <td>$row[nama_bank]</td>
                      <td>$row[no_rekening]</td>
                      <td>$row[pemilik_rekening]</td>
                  </tr>";
              $noo++;
            }

        echo "</tbody>
      </table>";


      foreach ($record->result_array() as $row){
        if ($row['proses']=='0'){ $proses = '<i class="text-danger">Pending</i>'; $color = 'danger'; $text = 'Pending'; }
        elseif($row['proses']=='1'){ $proses = '<i class="text-warning">Packing</i>'; $color = 'warning'; $text = 'Packing'; }
        elseif($row['proses']=='2'){ $proses = '<i class="text-info">Konfirmasi</i>'; $color = 'info'; $text = 'Konfirmasi'; }
        elseif($row['proses']=='3'){ $proses = '<i class="text-success">Dikirim</i>'; $color = 'success'; $text = 'Dikirim'; }
        else{ $proses = '<i class="text-success">Diterima </i>'; $color = 'primary'; $text = 'Diterima'; }
        $total = $this->db->query(
            "SELECT a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, e.nama_kota, f.nama_provinsi, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) 
            as total, sum(c.berat*b.jumlah) as total_berat 
            FROM `rb_penjualan` a 
            JOIN rb_penjualan_detail b 
            ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk 
            JOIN rb_konsumen d ON a.id_pembeli=d.id_konsumen 
            JOIN rb_kota e ON d.kota_id=e.kota_id 
            JOIN rb_provinsi f ON e.provinsi_id=f.provinsi_id 
            where a.kode_transaksi='$row[kode_transaksi]'")->row_array();

      echo "<button class='btn btn-info'><a style='color:white;' href='".base_url()."administrator/status_diterima/$row[id_penjualan]/4' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi Diterima ?')\"> Diterima</a></button> &nbsp ";
      echo "<a style='font-style:italic; color: grey;'>Apakah Anda sudah menerima barang pesanan Anda? Jika ya, silahkan konfirmasi barang diterima</a>";
      }
      ?>