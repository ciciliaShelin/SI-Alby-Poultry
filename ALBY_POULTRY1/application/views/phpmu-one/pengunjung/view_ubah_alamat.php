<?php 
  echo "<p class='sidebar-title'><span class='glyphicon glyphicon-triangle-right'></span> Ubah Alamat Pengiriman</p>
        <p hidden>Berikut Informasi Data Profile anda.<br> 
           Pastikan data-data dibawah ini sudah benar, agar tidak terjadi kesalahan saat transaksi.</p>";                
                  $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
                  echo form_open_multipart('members/Ubah_Alamat',$attributes); 
                  echo "<table class='table table-hover table-condensed'>
                        <thead>
                          <tr hidden><td width='140px'><b>Username</b></td> <td><input class='required form-control' style='width:50%; display:inline-block' name='aa' type='text' value='$row[username]'></td></tr>
                          <tr hidden><td><b>Password</b></td>       <td><input class='form-control' style='width:50%; display:inline-block' type='password' name='a'> <small style='color:red'><i>Kosongkan Saja JIka Tidak ubah.</i></small></td></tr>
                          <tr hidden><td><b>Nama Lengkap</b></td>   <td><input class='required form-control' type='text' name='b' value='$row[nama_lengkap]'></td></tr>
                          <tr hidden><td><b>Email</b></td>          <td><input class='required email form-control' type='email' name='c' value='$row[email]'></td></tr>
                          <tr hidden><td><b>Jenis Kelamin</b></td>  <td>"; if ($row['jenis_kelamin']=='Laki-laki'){ echo "<input type='radio' value='Laki-laki' name='d' checked> Laki-laki <input type='radio' value='Perempuan' name='d'> Perempuan "; }else{ echo "<input type='radio' value='Laki-laki' name='d'> Laki-laki <input type='radio' value='Perempuan' name='d' checked> Perempuan "; } echo "</td></tr>
                          <tr hidden><td><b>Tanggal Lahir</b></td>  <td><input class='required datepicker form-control' type='text' name='e' value='$row[tanggal_lahir]' data-date-format='yyyy-mm-dd'></td></tr>
                          <tr hidden><td><b>Tempat Lahir</b></td>   <td><input class='required form-control' type='text' name='f' value='$row[tempat_lahir]'></td></tr>
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
                          <tr hidden><td><b>No Hp</b></td>                  <td><input style='width:40%' class='required number form-control' type='number' name='l' value='$row[no_hp]'></td></tr>
                         
                          <tr><td></td><td><input class='btn btn-sm btn-primary' type='submit' name='submit' value='Simpan Perubahan'></td></tr>
                        </thead>
                    </table>";
                  echo form_close();
?>