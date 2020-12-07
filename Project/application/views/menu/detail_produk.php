<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

<!-- Topbar -->

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Produk</h1>
    <?php foreach ($DetailProduk as $dt):?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
      </div>
      <div class="card-body">

        <img src="<?= base_url('uploads/produk/') . $dt['gambar'];?>" alt="gambar produk" class="logo-komunitas mx-auto d-block mb-5" style="width:300px;">

        <div class="row">
          <div class="my-auto col-sm-2">
            <p>Nama Barang : </p>
          </div>
          <div class="my-auto col-sm-9">
            <p><?= $dt['nama_barang'];?></p>
          </div>
        </div>

       

        <div class="row">
          <div class="my-auto col-sm-2">
            <p>Harga : </p>
          </div>
          <div class="my-auto col-sm-9">
            <p><?= $dt['harga']; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="my-auto col-sm-2">
            <p>Deskripsi : </p>
          </div>
          <div class="my-auto col-sm-9">
            <p><?= $dt['deskripsi']; ?></p>
          </div>
        </div>
        <?php endforeach ; ?>
        <a href="<?php echo base_url('menu/daftar_produk'); ?>" class="btn btn-danger btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-reply"></i>
          </span>
          <span class="text">Kembali</span>
        </a>

      </div>
    </div>
    <!-- /.card -->

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


</div>