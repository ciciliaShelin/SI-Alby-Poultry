<div class="container-fluid">
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="btn btn-sm btn-success">
        <?php
        $grand_total=0;
        if ($keranjang= $this->cart->contents())
        {
            foreach ($keranjang as $item)
            {
                $grand_total= $grand_total + $item['subtotal'];
            }
        echo "<h4> TOTAL PEMBAYARAN : Rp.  " .number_format($grand_total,0,',','.');
        ?>
        </div><br><br>
        <h3>INPUT ALAMAT PENGIRIMAN DAN PEMBAYARAN</h3>

        <form method="post" action="<?php echo base_url('dashboard/proses_pesanan')?>">

            <div class="form-group">
            <label> Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" required>
            </div>

            <div class="form-group">
            <label> Alamat Lengkap</label>
            <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control" required>
            </div>

            <div class="form-group">
            <label> Nomor Telepon</label>
            <input type="text" name="no_tlp" placeholder="Nomor Telepon Anda" class="form-control" required>
            </div>

            <div class="form-group">
            <label> Jasa Pengiriman</label>
                <select class="form-control" required>
                    <option>JNE</option>
                    <option>JNT</option>
                    <option>TIKI</option>
                </select>
            </div>

            <div class="form-group">
            <label> Pilih BANK</label>
                <select class="form-control" required>
                    <option>BRI - XXXXXXXX</option>
                    <option>BNI - XXXXXXXX</option>
                    <option>BCA - XXXXXXXX</option>
                </select>
            </div>

            <button type="submit" class="btn btn-sm btn-primary mb-5"> Checkout </button>
            </form>
            <?php
        } else
        {
            redirect('dashboard/pesanan');
        }
            ?>

    <div class="col-md-2"></div>

</div>
</div>