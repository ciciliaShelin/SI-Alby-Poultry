<!-- <h2>Daftar Belanja</h2> -->
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?= base_url('auth'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active"> <?= $title; ?></li>
    </ul>
	<h3>  <?= $title; ?> [ <small>3 Item(s) </small>]<a href="<?= base_url('produk/semuaproduk'); ?>" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Lanjutkan Belanja </a></h3>	
	<hr class="soft"/>


<form action="<?php echo base_url()?>transaksi/ubah_cart" method="post" name="frmShopping" id="frmShopping" class="form-horizontal" enctype="multipart/form-data">
<?php
	if ($cart = $this->cart->contents())
		{
 ?>

<table class="table">
<tr id= "main_heading">
<td width="2%">No</td>
<td width="10%">Gambar</td>
<td width="33%">Item</td>
<td width="15%">Harga</td>
<td width="15%">Qty</td>
<td width="15%">Total harga</td>
<td width="10%">Hapus</td>
</tr>
<?php
// Create form and send all values in "shopping/update_cart" function.
$grand_total = 0;
$i = 1;

foreach ($cart as $item):
$grand_total = $grand_total + $item['subtotal'];
?>
<input type="hidden" name="cart[<?= $item['id'];?>][id]" value="<?= $item['id'];?>" />
<input type="hidden" name="cart[<?= $item['id'];?>][rowid]" value="<?= $item['rowid'];?>" />
<input type="hidden" name="cart[<?= $item['id'];?>][name]" value="<?= $item['name'];?>" />
<input type="hidden" name="cart[<?= $item['id'];?>][price]" value="<?= $item['price'];?>" />
<input type="hidden" name="cart[<?= $item['id'];?>][gambar]" value="<?= $item['gambar'];?>" />
<input type="hidden" name="cart[<?= $item['id'];?>][qty]" value="<?= $item['qty'];?>" />
<tr>
<td><?= $i++; ?></td>
<td><img class="img-responsive" src="<?= base_url() . 'uploads/produk/'.$item['gambar']; ?>" style="width: 80px; height:50px;"/></td>
<td><?= $item['name']; ?></td>
<td><?= number_format($item['price'], 0,",","."); ?></td>
<td><input type="number" class="span1" placeholder="Qty." name="cart[<?= $item['id'];?>][qty]" value="<?= $item['qty'];?>"/></td>
<td>Rp. <?= number_format($item['subtotal'], 0,",",".") ?></td>
<td><a href="<?= base_url()?>transaksi/hapus/<?= $item['rowid'];?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"><small>delete</small></i></a></td>
<?php endforeach; ?>
</tr>
<tr>
<td colspan="4"><b style=" font-weight:900;">Grand Total: Rp <?= number_format($grand_total, 0,",","."); ?></b></td>
<td colspan="4" align="right">
<a data-toggle="modal" data-target="#myModal"  class ='btn btn-sm btn-danger'>Kosongkan Cart</a>
<button class='btn btn-sm btn-success'  type="submit">Update Cart</button>
<a href="<?= base_url()?>transaksi/check_out"  class ='btn btn-sm btn-primary'>Check Out</a>
</tr>

</table>

<!-- <a href="<?= base_url('produk/semuaproduk'); ?>" class="btn btn-large"><i class="icon-arrow-left"></i> Lanjutkan Belanja </a>
	<a href="<?= base_url('auth/login'); ?>" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a> -->
	
</div>	
</div></div>
</div>


<?php
		}
	else
		{
			echo "<h3>Keranjang Belanja masih kosong</h3>";	
		}	
?>
</form>


  <!-- Modal Penilai -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
      	<form method="post" action="<?php echo base_url()?>transaksi/hapus/all">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <div class="modal-body">
			Anda yakin mau mengosongkan Shopping Cart?
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-sm btn-default">Ya</button>
        </div>
        
        </form>
      </div>
      
    </div>
  </div>
  <!--End Modal-->
  