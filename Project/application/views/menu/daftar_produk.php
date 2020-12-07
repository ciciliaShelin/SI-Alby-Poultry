<div class="container-fluid">
          <form method="post">
          <div class="well well-lg">
              <div class="container">
                  <h2><?= $title; ?></h2>
                  <span>Halaman yang berisi daftar produk toko Alby Poultry</span>
              </div>
          </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="col mt-3">
                <div class="col-lg-11">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?> 
                  <?php echo $this->session->flashdata('message');?>
                </div>
              </div>

              <div class="card-body">
              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambahkan Produk Baru</a>
              <!-- <div class="col-md-3 mt-3">
                  <select name="" id="status" class="form-control">
                      <option value="3">Show All</option>
                      <option value="0">Pending</option>
                      <option value="1">Aktif</option>
                      <option value="2">Cancel</option>
                    </select>
              </div> -->
                <div class="table-responsive">
                  <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th style="width: 5px">No</th>
                        <th scope="col">Nama Barang</th>
                        <!-- <th scope="col">Jenis Barang</th> -->
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Gambar</th>
                        <th style="width: 96px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($MenuProduk as $mp) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $mp['nama_barang']; ?></td>
                            <!-- <td><?= $mp['nama_jenis']; ?></td> -->
                            <td><?= $mp['harga']; ?></td>
                            <td><?= $mp['deskripsi']; ?></td>
                            <td><?= $mp['gambar']; ?></td>
                            <td>
                                <a href="<?php echo base_url("menu/detail_produk/".$mp['id_barang']);?>"
                                    class="btn btn-sm btn-primary btn-circle">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <!-- <a href="<?php echo base_url("berita/editdata/".$mp['id_mperita']);?>"
                                    class="mptn btn-sm btn-success btn-circle">
                                    <i class="fas fa-pen"></i>
                                </a> -->
                                <a href="#"
                                    onclick="confirm_modal('<?='hapus/'.$mp['id_barang']; ?>')"
                                    class="btn btn-sm btn-danger btn-circle"
                                    data-toggle="modal" data-target="#hapusModal">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="#"
                                    
                                    class="btn btn-sm btn-danger btn-circle"
                                    data-toggle="modal" data-target="#ModalDetail">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </td>
                            <!-- <td>
                                <a href="" class="badge badge-danger">detail</a>
                                <a href="" class="badge badge-success">edit</a>
                                <a href="" class="badge badge-danger">delete</a>
                            </td> -->
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                  </table>

                  <!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Product Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('menu/daftar_produk');  ?>
            <!-- <form action="<?= base_url('menu/submenu'); ?>" method="POST" enctype="multipart/form-data"> -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                    </div>
                    <!-- <div class="form-group">
                        <select name="jenis_id" id="jenis_id" class="form-control">
                            <option value="">Select Jenis</option>
                            <?php foreach($Jenis as $j): ?>
                                <option value="<?= $j['id_jenis']; ?>"><?= $j['nama_jenis']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <input type="file"  id="gambar"  name="gambar" >
                    </div>
                   
                    <!-- <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                            <label for="is_active" class="form-check-label">Active?</label>
                        </div>
                    </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            <!-- </form> -->
            <?= form_close(); ?>
        </div>
    </div>
</div>


                  <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin untuk menghapus?</h5>
                          <button class="close" type="button" data-dismiss="modal"
                                  aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal" untuk kembali ke Panel Admin.</div>
                        <div class="modal-footer">
                          <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                          <a id="delete_link" class="btn btn-danger" href="">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
                </div>
              </div>
            </div>
          </form>
       </div>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

<script type="text/javascript">
      $(document).ready(function() {
        status();
          $('#status').change(function() {
              status();
          });
      });

      function confirm_modal(delete_url) 
      {
        $('#hapusModal').modal('show', {
                        backdrop: 'static'
                    });
                    document.getElementById('delete_link').setAttribute('href', delete_url);
      }

      // function status()
      // {
      //   var status = $("#status").val();
      //   $.ajax({
      //     url: "<?= base_url('admin/get_status_verifpanti')?>",
      //     data: "status=" + status,
      //     success: function(data)
      //     {
      //       $('#dataTable tbody').html(data);
      //     } 
      //   });
      // }

</script>