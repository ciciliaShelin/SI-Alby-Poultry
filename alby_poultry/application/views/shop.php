<div class="container-fluid">

<!-- Content Row -->
<div class="row text-center mt-5">

<?php foreach ($barang as $brg) : ?>
 <div class="card ml-3 mb-3" style="width: 16rem;">
    <img src="<?php echo base_url().'./uploads/' .$brg->gambar_brg ?>" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title mb-1"><?php echo $brg->nama_barang ?></h5>
    <small><?php echo $brg->deskripsi ?></small><br>
    <span class="badge badge-success mb-3"> Rp. <?php echo number_format ($brg->harga, 0, ',','.') ?></span> <br>
    <?php echo anchor ('dashboard/tambah_ke_keranjang/' .$brg->id_barang, '<div class="btn btn-sm btn-primary">Tambah Keranjang</div>') ?>
    <?php echo anchor ('dashboard/detail/' .$brg->id_barang, '<div class="btn btn-sm btn-success">Detail</div>') ?>
    </div>
    </div>
<?php endforeach; ?>
</div>
</div>
