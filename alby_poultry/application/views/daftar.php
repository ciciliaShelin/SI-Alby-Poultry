<div class="container-fluid">
    <h1>REGISTER</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
      <form method ="post" action="<?php echo base_url('daftar/index') ?>" class="user">
    <label for="nama-lengkap"><b>Nama Lengkap</b></label></br>
    <input type="text" placeholder="Enter Nama (sesuai KTP)"  name="nama" required>
    </br>
    <label for="nama-lengkap"><b>Username</b></label></br>
    <input type="text" placeholder="Enter Username"  name="username" required>
    </br>
    <label for="email"><b>Email</b></label></br>
    <input type="text" placeholder="Enter Email" name="email" required>
    </br>
    <label for="no-hp"><b>Nomor HP</b></label></br>
    <input type="text" placeholder="Enter Nomor HP" name="no_tlp" required>
    </br>
    <label for="psw"><b>Password</b></label></br>
    <input type="password" placeholder="Enter Password"  name="password_1" required>
    <?php echo form_error('password_1', '<div class="text-danger small">', '</div>') ?>
    </br>
    <label for="psw-repeat"><b>Repeat Password</b></label></br>
    <input type="password" placeholder="Repeat Password" name="password_2" required>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <input type="submit" name ="submit" class="registerbtn" value="Register"></input>
  
  <div class="container signin">
    <p>Sudah Memiliki Akun? <a href="<?php echo base_url('Login/index')?>">Login</a>.</p>
  </div>
  <div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>
</form> 