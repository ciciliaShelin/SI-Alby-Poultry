  <?= $this->session->flashdata('message'); ?>
  <p class='sidebar-title'> Login Users</p> 

            <div class='alert alert-info'>Masukkan username dan password untuk login</div>
            <br>
            <div class="logincontainer">
                <form method="post" action="<?php echo base_url(); ?>auth/login" role="form" id='formku'>
                    <div class="form-group">
                        <label for="inputEmail">Username</label>
                        <input type="text" name="a" class="required form-control" placeholder="Masukkan Username" autofocus=""  minlength='5' onkeyup="nospaces(this)">
                        <?= form_error('a', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="b" class="form-control required" placeholder="Masukkan Password" onkeyup="nospaces(this)" autocomplete="off">
                    </div>
                    <a href="<?= base_url('auth/forgotPass'); ?>" >Lupa Password</a><br><br>
                    <div align="center">
                        <input name='login' type="submit" class="btn btn-primary" value="Login"> <a href="<?php echo base_url(); ?>auth/register" title="Mari gabung bersama Kami" class="btn btn-default">Belum Punya Akun?</a>
                    </div>
                </form>
            </div>