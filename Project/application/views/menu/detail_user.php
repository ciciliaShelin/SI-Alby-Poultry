<div class="well well-lg">
    <div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <p class="mb-4">Tabel di bawah ini berisi detail profile umum Pengguna Web Alby Poultry</p>

    <?php foreach ($DetailUser as $du):?>

        <div id="gallery" class="span3">
            <img src="<?= base_url('uploads/produk/') . $du['image'];?>" alt="gambar produk" class="logo-komunitas mx-auto d-block mb-5" style="width:500px;">
        </div>


        <!-- <span>Detail untuk <b><?= $du['name'];?></b>.</span> -->
    </div>
</div>
<div class ="container">
    <table class ="well table table-bordered">
    
        <tr>
            <td width="200">
                Nama
            </td>
            <td width="1">:</td>
            <td>
                <?= $du['name'];?>
            </td>
        </tr>

        <tr>
            <td width="200">
                Jenis Kelamin
            </td>
            <td width="1">:</td>
            <td>
                <?= $du['jenis_kelamin'];?>
            </td>
        </tr>

        <tr>
            <td>
                Alamat
            </td>
            <td width="1">:</td>
            <td>
                <?= $du['alamat'];?>
            </td>
        </tr>

        <tr>
            <td>
                No Telepon
            </td>
            <td width="1">:</td>
            <td>
                <?= $du['no_tlp'];?>
            </td>
        </tr>

        <tr>
            <td>
                Status
            </td>
            <td width="1">:</td>
            <td>
                <?= $du['status'];?>
            </td>
        </tr>

        <tr>
            <td>
                Email
            </td>
            <td width="1">:</td>
            <td>
            <?= $du['email'];?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td>
                <a href="mailto: <?= $du['email'];?> " class="btn btn-danger">
                <i class="glyphicon glyphicon-envelope"></i>Kirim Email</a>
<?php endforeach; ?>
                <a href="<?php echo base_url('user/daftar_user'); ?>" class="btn btn-danger ">
                <span class="icon text-white-50">
                  <i class="fas fa-reply"></i>
                </span>
                <span class="text">Kembali</span>
            </td>
        </tr>

    </table>
</div>
