<script src="<?= base_url('assets/') ?>themes/js/jquery.lightbox-0.5.js"></script>
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="<?= base_url('user'); ?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?= base_url('produk/semuaproduk/'); ?>">Products</a> <span class="divider">/</span></li>
    <li class="active"><?= $title; ?></li>
    </ul>	
	<div class="row">	
	<?php foreach ($Detailproduk as $dt):?>  
			<div id="gallery" class="span3">
				<a href="<?= base_url('uploads/produk/') . $dt['gambar'];?>" title=<?= $dt['nama_barang'];?>>
					<img src="<?= base_url('uploads/produk/') . $dt['gambar'];?>" style="width:100%" alt=<?= $dt['nama_barang'];?>/>
				</a>
			</div>
			<div class="span6">
				<h3><?= $dt['nama_barang'];?>  </h3>
				<h4 style="color:red">100 items in stock</h4>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>Rp ...</span></label>
					<div class="controls">
					<input type="number" class="span1" placeholder="Qty."/>
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				</form>
				
				<hr class="soft"/>
				<p>
				<?= $dt['deskripsi'];?>
				</p>
				<?php endforeach; ?>
				<hr class="soft clr"/>
				<!-- <a class="btn btn-small pull-right" href="#detail">More Details</a>
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/> -->
			</div>
			
			<!-- <div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
			</ul>
			
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">Fujifilm</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2">FinePix S2950HD</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> 2011-01-28</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Dimensions:</td><td class="techSpecTD2"> 5.50" h x 5.50" w x 2.00" l, .75 pounds</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2">3</td></tr>
				</tbody>
				</table>
              </div>

			</div>
		  </div> -->


	</div>
</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->
