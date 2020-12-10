<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_admin"><i class="fas fa-plus fa-sm"> </i>Tambah User</button>

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>USERNAME </th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>ROLE ID</th>
            <th colspan="3">AKSI</th>
</tr>

<?php
$no=1;
foreach ($admin as $adm) : ?>

<tr>
     <td><?php echo $no++ ?> </td>
     <td><?php echo $adm->username?> </td>
     <td><?php echo $adm->nama?> </td>
     <td><?php echo $adm->email?> </td>
     <td><?php echo $adm->password?> </td>
     <td><?php echo $adm->role_id?> </td>
     <td> <div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div></td>
     <td><?php echo anchor ('admin/data_admin/edit/' .$adm->id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?> </td>
     <td><?php echo anchor('admin/data_admin/hapus/' .$adm->id,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>

</tr>
<?php endforeach;  ?>
</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT DATA ADMIN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_admin/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
        <label> Username </label>
        <input type="text" name="username" class="form-control">
        </div>

        <div class="form-group">
        <label> Nama </label>
        <input type="text" name="nama" class="form-control">
        </div>

        <div class="form-group">
        <label> Email </label>
        <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
        <label> Password </label>
        <input type="text" name="password" class="form-control">
        </div>

        <div class="form-group">
        <label> Role Id </label>
        <input type="text" name="role_id" class="form-control">
        </div>

        <div class="form-group">
        <label> Gambar </label> <br>
        <input type="file" name="gambar" class="form-control">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
      </div>
      </form>
    </div>
  </div>
</div>