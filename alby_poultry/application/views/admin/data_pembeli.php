<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_pembeli"><i class="fas fa-plus fa-sm"> </i>Tambah Pembeli</button>

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>NAMA PEMBELI </th>
            <th>NOMOR TELEPON</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>ALAMAT </th>
            <th colspan="3">AKSI</th>
</tr>

<?php
$no=1;
foreach ($pembeli as $res : ?>

<tr>
     <td><?php echo $no++ ?> </td>
     <td><?php echo $res->nama_pembeli?> </td>
     <td><?php echo $res->no_tlp?> </td>
     <td><?php echo $res->email?> </td>
     <td><?php echo $res->password?> </td>
     <td><?php echo $res->alamat?> </td>
     <td> <div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div></td>
     <td><?php echo anchor ('admin/data_pembeli/edit/' .$res->id_pembeli,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?> </td>
     <td><?php echo anchor('admin/data_pembeli/hapus/' .$res->id_pembeli,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>

</tr>
<?php endforeach;  ?>
</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_pembeli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PEMBELI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_pembeli/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
        <label> Nama Pembeli </label>
        <input type="text" name="nama_pembeli" class="form-control">
        </div>

        <div class="form-group">
        <label> Nomor Telepon </label>
        <input type="text" name="no_tlp" class="form-control">
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
        <label> Alamat </label>
        <input type="text" name="alamat" class="form-control">
        </div>

        <div class="form-group">
        <label> Pas Foto </label> <br>
        <input type="file" name="pas_foto" class="form-control">
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