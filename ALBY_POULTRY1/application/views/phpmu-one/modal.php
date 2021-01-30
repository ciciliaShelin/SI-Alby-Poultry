
<div class="modal fade" id="rekening" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">No Rekening Perusahaan</h5>
      </div>
      <div class="modal-body">
          <?php 
            echo "<table class='table table-hover table-condensed'>
                  <tr bgcolor=#cecece>
                    <th>No</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Atas Nama</th>
                    <th></th>
                  </tr>";
                  $no = 1;
                  $rekening = $this->db->query("SELECT * FROM rb_rekening");
                  foreach ($rekening->result_array() as $row){
                  echo "<tr>
                        <td>$no</td>
                        <td>$row[nama_bank]</td>
                        <td>$row[no_rekening]</td>
                        <td>$row[pemilik_rekening]</td>
                      </tr>";
                    $no++;
                  }
                echo "</table>";
          ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="lupass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title" id="myModalLabel">Lupa Password?</h5>
      </div><center>
      <div class="modal-body">
      <?php
          $attributes3 = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
          // echo form_open_multipart('auth/lupass',$attributes3); 
          echo form_open_multipart('auth/forgotPass',$attributes3); 
      ?>
        <div class="form-group">
          <center style='color:red'>Masukkan Email yang dipakai saat pendaftaran</center><br>
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
          <div class='col-sm-9'>
          <div style='background:#fff;' class="input-group col-sm-10">
            <input style='text-transform:lowercase;' type="email" class="required form-control" name="a" required>
          </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3">
            <button type="submit" name='lupa' class="btn btn-primary">Kirim</button>
            &nbsp; &nbsp; &nbsp;<a data-dismiss="modal" aria-hidden="true" data-toggle='modal' href='#login' data-target='#login' title="Lupa Password Members">Kembali Login?</a>
          </div>
        </div>
        </form><div style='clear:both'></div>
      </div></center>
    </div>
  </div>
</div>





<div class="modal fade" id="ubahAlamat" tabindex="-1" aria-labelledby="ubahAlamatLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahAlamatLabel">Ubah Alamat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      
      <?php 
      $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
      echo form_open_multipart('members/edit_profile',$attributes); 
      echo "<table class='table table-hover table-condensed'>
      <thead>

        <tr><td><b>Alamat</b></td>         <td><textarea class='required form-control' name='g'>$row[alamat_lengkap]</textarea></td></tr>
        <tr><td><b>Kota Sekarang</b></td>             <td><select class='form-control' name='j' id='city' required>
                                                    <option value=''>- Pilih -</option>";
                                                    foreach ($kota->result_array() as $rows){
                                                      if ($row['kota_id']==$rows['kota_id']){
                                                        echo "<option value='$rows[kota_id]' selected>$rows[nama_kota]</option>";
                                                      }else{
                                                        echo "<option value='$rows[kota_id]'>$rows[nama_kota]</option>";
                                                      }
                                                    }
                                                 echo "</select>
        </td></tr>
        <tr><td><b>No Hp</b></td>                  <td><input style='width:40%' class='required number form-control' type='number' name='l' value='$row[no_hp]'></td></tr>
       
        <tr><td></td><td><input class='btn btn-sm btn-primary' type='submit' name='submit' value='Simpan Perubahan'></td></tr>
      </thead>
      </table>";
      echo form_close();
      ?>
        
      
    </div>
  </div>
</div>