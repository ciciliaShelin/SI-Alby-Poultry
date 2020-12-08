<div class="container-fluid">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/slide3.jpg') ?>" width='400px' height='500px' class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/img/slide 8.jpg') ?>" width='400px' height='500px' class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<section class="section pt-5 top-slant-white2 relative-higher">
      <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade">
            <div class="col-md-7 text-center heading-wrap">
              <h2 data-aos="fade-up">Welcome To Alby Poultry Official Website</h2>
          </div>
        </div>
        

               
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title" align="center"> What is Alby Poultry? </h2>
                        <p align="justify"> Alby Poultry merupakan toko yang berdiri sejak tahun 2012.Toko ini bergerak dalam bidang usaha Supplier Sapronak seperti : Tempat Minum ayam otomatis (TMAO), Tempat Pakan Ayam (TPA), Baby Chick Feeder (BCF) untuk anak ayam, Pemanas Anak Ayam/Gas Brooder, NIPPLE, dll. Melalui situs ini, Anda akan mendapatkan produk peralatan kandang langsung dari produsennya.Karna langsung dari produsennya otomatis Anda akan mendapatkan barang yang lebih murah dari pasaran.  Dengan harga murah dan terjangkau, dengan sistem terima barang pesanan di alamat masing-masing.</p>
                        <p align="center"> Buat kamu yang ingin mencari barang barang ternak, <h6 class="block-title" align="center"> DISINILAH SOLUSINYA!!!! </h6> </p>
                        <p align="center"><a href="dashboard/shop" class="smoothscroll btn btn-primary">Beli Sekarang</a></p>
                    </div>
                </div>

                <br>

</br>
 <!-- end col -->
  <!-- Content Row -->
  <div class="row text-center mt-5">

    <?php foreach ($barang as $brg) : ?>
     <div class="card ml-3 mb-3" style="width: 16rem;">
        <img src="<?php echo base_url().'./uploads/' .$brg->gambar_brg ?>" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title mb-1"><?php echo $brg->nama_barang ?></h5>
        <small><?php echo $brg->deskripsi ?></small><br>
        <span class="badge badge-pill badge-success mb-3"> Rp. <?php echo number_format ($brg->harga, 0, ',','.') ?></span> <br>
        <?php echo anchor ('dashboard/tambah_ke_keranjang/' .$brg->id_barang, '<div class="btn btn-sm btn-primary">Tambah Keranjang</div>') ?>
        <?php echo anchor ('dashboard/detail/' .$brg->id_barang, '<div class="btn btn-sm btn-success">Detail</div>') ?>
        </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>