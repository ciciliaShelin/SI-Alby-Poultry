<?= $this->session->flashdata('message'); ?>
  <p class='sidebar-title'> Halamn Lupa Password</p> 

            <div class='alert alert-info'>Masukkan email Anda untuk me-reset ulang password</div>
            <br>
            <div class="logincontainer">
                <form method="post" action="<?php echo base_url(); ?>auth/forgotPass" role="form" id='formku'>
                    <div class="form-group">
                        <label for="inputEmail">Masukan email Anda</label>
                        <input type="text" name="email" class="required form-control" placeholder="Masukkan email Anda" autofocus="" onkeyup="nospaces(this)">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>  <hr class="soft"/>
                    <a href="<?= base_url('auth/login'); ?>" style="text-decoration:underline">back to login</a>

                </form>
            </div>