<!-- QUERY MENU PRODUK -->
<?php 
$queryMenu = "SELECT * FROM barang ";
$MenuProduk = $this->db->query($queryMenu)->result_array();
?>
<div id="mainBody">
	<div class="container">
	<div class="row">        
<!-- Sidebar ================================================== -->
<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="<?= base_url('produk/keranjang_belanja'); ?>"><img src="<?= base_url('assets/'); ?>themes/images/ico-cart.png" alt="cart">
		3 Items in your cart   <?php $keranjang = 'Keranjang Belanja : ' .$this->cart->total_items(). 'items'  ?>
		<span class="badge badge-warning pull-right">$155.00</span></a></div>

		<?php foreach ($MenuProduk as $mp) : ?> 
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu">
				<a href="<?= base_url("produk/detailproduk/".$mp['id_barang']); ?>"> <?= $mp['nama_barang'];?> [<?= $mp['stok'];?>]</a>
			</li>
		</ul>
		<?php endforeach; ?>
		<br/>
		  <!-- <div class="thumbnail">
			<img src="<?= base_url('assets/'); ?>themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="<?= base_url('assets/'); ?>themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="<?= base_url('assets/'); ?>themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div> -->
	</div>
<!-- Sidebar end=============================================== -->