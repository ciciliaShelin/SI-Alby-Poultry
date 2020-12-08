<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA ADMIN</h3>

    <?php foreach ($admin as $adm): ?>

        <form method="post" action="<?php echo base_url(). 'admin/data_admin/update'?>">

        <div class="for-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $adm->username?>">
        </div>

        <div class="for-group">
        <label>Nama Admin</label>
        <input type="hidden" name="id_admin" class="form-control" value="<?php echo $adm->id_admin?>">
        <input type="text" name="nama_admin" class="form-control" value="<?php echo $adm->nama_admin?>">
        </div>

        <div class="for-group">
        <label>Email </label>
        <input type="text" name="email" class="form-control" value="<?php echo $adm->email?>">
        </div>

        <div class="for-group">
        <label>Password</label>
        <input type="text" name="password" class="form-control" value="<?php echo $adm->password?>">
        </div>

        <div class="for-group">
        <label>Alamat</label>
        <input type="text" name="alamat_admin" class="form-control" value="<?php echo $adm->alamat_admin?>">
        </div>
 
        <button type="submit" class="btn btn-primary btn-sm"> Simpan </button>
        </form>

<?php endforeach; ?>
</div>
