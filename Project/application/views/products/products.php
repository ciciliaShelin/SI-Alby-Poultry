           <!-- QUERY MENU PRODUK -->
		   <?php 
        $queryMenu = "SELECT * FROM barang ";
        $MenuProduk = $this->db->query($queryMenu)->result_array();
        ?>

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?= base_url('user'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active"><?= $title; ?></li>
    </ul>
	<h3> Semua Produk <small class="pull-right">  </small></h3>	
	<hr class="soft"/>
	<p>
		Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular and we have a great number of faithful customers all over the country.
	</p>
	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sort By </label>
			<select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
		</div>
	  </form>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
		<div class="row">	
			<?php foreach ($MenuProduk as $mp) : ?>  
			<div class="span2">
				<img src="<?= base_url('uploads/produk/') . $mp['gambar'];?>" alt="" style="width: 150px; height:120px;"/>
				
			</div>
			<div class="span4">
				<h4><?= $mp['nama_barang']; ?></h4>				
				<!-- <hr class="soft"/> -->
				<!-- <h5>Product Name </h5> -->
				<p>
				<?= $mp['deskripsi']; ?>
				</p>
				<!-- <a class="btn btn-small pull-right" href="<?= base_url('produk/detailproduk'); ?>">View Details</a> -->
				
			</div>
			
			<div class="span3 alignR">
			<form action="<?= base_url();?>transaksi/tambah" method="post" class="form-horizontal qtyFrm">
                <br>
			<h4>Rp. <?= number_format($mp['harga'], 0,",",".") ?></h4>
			<!-- <label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br/> -->
					<input type="hidden" name="id" value="<?= $mp['id_barang']; ?>" />
                	<input type="hidden" name="nama" value="<?= $mp['nama_barang']; ?>" />
                  	<input type="hidden" name="harga" value="<?= $mp['harga']; ?>" />
                  	<input type="hidden" name="gambar" value="<?= $mp['gambar']; ?>" />
					  <input type="hidden" name="qty" value="1" />
			  <button type="submit" class="btn btn-primary"> Add to <i class=" icon-shopping-cart"></i></button>
			  <a href="<?= base_url("produk/detailproduk/".$mp['id_barang']); ?>" class="btn "><i class="icon-zoom-in"></i></a> <br> <br> <br>
			</form>
			</div>
			<hr >
			<?php endforeach; ?>
			
		</div>
		<hr class="soft"/>

	</div>
	<form action="<?= base_url();?>transaksi/tambah" method="post" >
					<input type="hidden" name="id" value="<?= $mp['id_barang']; ?>" />
                	<input type="hidden" name="nama" value="<?= $mp['nama_barang']; ?>" />
                  	<input type="hidden" name="harga" value="<?= $mp['harga']; ?>" />
                  	<input type="hidden" name="gambar" value="<?= $mp['gambar']; ?>" />
                  	<input type="hidden" name="qty" value="1" />
	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
		<?php foreach ($MenuProduk as $mp) : ?>  
			<li class="span3">
			  <div class="thumbnail">
				<a href="<?= base_url("produk/detailproduk/".$mp['id_barang']); ?>"><img src="<?= base_url('uploads/produk/') . $mp['gambar'];?>" style="width: 220px; height:220px;" alt=""/></a>
				<div class="caption" style="text-align:center">
				  <h5><?= $mp['nama_barang']; ?></h5>
				  <a > Rp. <?= number_format($mp['harga'], 0,",",".") ?></a>
				  <!-- <p> 
				  <?= $mp['deskripsi']; ?> 
				  </p> -->
				</div>
				<h4 style="text-align:center"><a class="btn" href="<?= base_url("produk/detailproduk/".$mp['id_barang']); ?>"> <i class="icon-zoom-in"></i></a> 
				<button type="submit" class="btn">Add to <i class="icon-shopping-cart"></i></button>
				
				</h4>
			  </div>
			</li>
		</form>
			<?php endforeach; ?>
		  </ul>
	<hr class="soft"/>
	</div>
</div>

	<!-- <a href="compair.html" class="btn btn-large pull-right">Compair Product</a> -->
	<div class="pagination">
			<ul>
			<li><a href="#">&lsaquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">&rsaquo;</a></li>
			</ul>
			</div>
			<br class="clr"/>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
