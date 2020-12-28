<?= $this->session->flashdata('message'); ?>
  <p class='sidebar-title'> Change Password</p> 

            <div class='alert alert-info'>Masukkan Password baru Anda. Lain kali harap diingat kembali Password Anda..</div>
            <br>
            <div class="logincontainer">
                <form method="post" action="<?php echo base_url(); ?>auth/changepassword" role="form" id='formku'>
                    <div class="form-group">
                        <label for="inputEmail">Masukan Password Baru</label>
                        <input type="password" name="password1" class="required form-control" placeholder="Masukkan Password baru..." autofocus=""  minlength='5' onkeyup="nospaces(this)">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword">Konfirmasi Password</label>
                        <input type="password" name="password2" class="form-control required" placeholder="Ulangi Password" onkeyup="nospaces(this)" autocomplete="off">
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>  <hr class="soft"/>
                </form>
            </div>