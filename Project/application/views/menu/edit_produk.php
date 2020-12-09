<div class="container-fluid">
<?= $this->session->flashdata('message'); ?>
    <h1 class="h3 mb-2 text-gray-800">Edit Produk</h1>
    <form action="<?= base_url('menu/edit_produk'); ?>" method="post" enctype="multipart/form-data">

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php foreach ($DetailProduk as $dt) : ?>
                    <input type="hidden" name="id_barang" value="<?php echo $dt['id_barang'] ?>">

                    <img src="<?= base_url('uploads/produk/') . $dt['gambar']; ?>" alt="Logo Komunitas" class="logo-komunitas mx-auto d-block mb-5" style="width:400px;">

                    <div class="row">
                        <div class="col">
                            <p>Nama Barang</p>
                            <div class="input-group">
                                <input type="text" id="nama_barang" name="nama_barang" class="form-control border-dark small mb-3" value="<?= $dt['nama_barang'] ?>" aria-describedby="basic-addon2">
                            </div>
                            <?= form_error('nama_barang', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Harga</p>
                            <div class="input-group">
                                <input type="text" id="harga" name="harga" class="form-control border-dark small mb-3" placeholder="Masukkan Harga Barang" value="<?= $dt['harga'] ?>" aria-describedby="basic-addon2">
                            </div>
                            <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Deskripsi Barang</p>
                            <div class="input-group">
                                <textarea type="text" id="deskripsi" name="deskripsi" class="form-control border-dark small mb-3" placeholder="Masukkan Deskripsi Barang" aria-describedby="basic-addon2"><?= $dt['deskripsi'] ?></textarea>
                            </div>
                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p>Stok Barang</p>
                            <div class="input-group">
                                <textarea type="text" id="stok" name="stok" class="form-control border-dark small mb-3" placeholder="Masukkan Stok Barang" aria-describedby="basic-addon2"><?= $dt['stok'] ?></textarea>
                            </div>
                            <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p>Upload Foto Baru</p>
                            <div class="input-group">
                                <input type="file" id="gambar" name="gambar" class="form-control border-dark small mb-3" value="<?php echo set_value('gambar') ?>" aria-describedby="basic-addon2">
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Update</span>
                </button>
                <a href="<?= base_url('menu/daftar_produk') ?>" class="btn btn-danger btn-icon-split">
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

</form>