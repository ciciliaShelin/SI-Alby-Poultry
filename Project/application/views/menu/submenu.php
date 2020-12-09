<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
 <p class="mb-4">Tabel di bawah ini berisi daftar produk-produk Toko Alby Poultry</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="" class="" style="font-weight: 900; font-size:17px;" data-toggle="modal" data-target="#newSubMenuModal">Tambahkan Produk Baru</a>
        </div>

    <div class="card-body">
        <div class="col-lg-11">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        </div>
        <?= $this->session->flashdata('message'); ?>

            
            <div class="table-responsive">
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <!-- <th scope="col">Gambar</th> -->
                        <!-- <th scope="col">Active</th> -->
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($MenuProduk as $mp) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $mp['nama_barang']; ?></td>
                           
                            <td><?= $mp['harga']; ?></td>
                            <td><?= $mp['deskripsi']; ?></td>
                            <!-- <td><?= $mp['gambar']; ?></td> -->
                            <td>
                                <a href="<?php echo base_url("menu/detail_produk/".$mp['id_barang']);?>"
                                    class="btn btn-sm btn-primary btn-circle">
                                    <i class="fas fa-plus"></i>
                                </a>
    
                                <a href="#"
                                    onclick="confirm_modal('<?='hapus/'.$mp['id_barang']; ?>')"
                                    class="btn btn-sm btn-danger btn-circle"
                                    data-toggle="modal" data-target="#hapusModal">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <!-- <a href="#" -->
                                <a href="<?php echo base_url("menu/edit_produk/".$mp['id_barang']);?>"
                                   
                                    class="btn btn-sm btn-success btn-circle"
                                    >
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- MODAL TAMBAH PRODUK BARU -->
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
            <!-- <form action="<?= base_url('menu/daftar_produk'); ?>" method="POST" enctype="multipart/form-data"> -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok Barang">
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

<!-- MODAL EDIT PRODUK -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">Add New Product Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('menu/edit_produk');  ?>
            <!-- <form action="<?= base_url('menu/edit_produk'); ?>" method="POST" enctype="multipart/form-data"> -->

           <div class="modal-body">
                <?php foreach ($DetailProduk as $dt):?> 
                <img src="<?= base_url('uploads/produk/') . $dt['gambar'];?>" alt="gambar produk" class="logo-komunitas mx-auto d-block mb-5" style="width:200px;">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok Barang">
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
                <?php endforeach; ?>
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



<script type="text/javascript">
                function confirm_modal(delete_url) {
                    $('#hapusModal').modal('show', {
                        backdrop: 'static'
                    });
                    document.getElementById('delete_link').setAttribute('href', delete_url);
                }
            </script>



 <!-- Modal -->
 <!-- <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><span class="fa fa-user"></span>&nbsp;Edit Data Produk</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <div class="modal-body" id="IsiModal">







                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span>  Tutup</button>
                </div>
            </div>
          </div>
        </div> -->
        <!-- akhir kode modal dialog -->



        
        
       

        