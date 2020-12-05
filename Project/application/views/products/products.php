           <!-- QUERY MENU PRODUK -->
		   <?php 
        $queryMenu = "SELECT barang.*, jenis_barang.nama_jenis
                        FROM barang JOIN jenis_barang 
                          ON barang.jenis_id = jenis_barang.id_jenis
                      
                    ";
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
				<img src="<?= base_url($mp['gambar']);?>" alt=""/>
			</div>
			<div class="span4">
				<h3><?= $mp['nama_barang']; ?></h3>				
				<hr class="soft"/>
				<!-- <h5>Product Name </h5> -->
				<p>
				<?= $mp['deskripsi']; ?>
				</p>
				<a class="btn btn-small pull-right" href="<?= base_url('produk/detailproduk'); ?>">View Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
                <br>
			<h4> Rp 50000</h4>
			<!-- <label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br/> -->
			<br> <br> <br>
			  <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
			  <a href="<?= base_url('produk/detailproduk'); ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
			<?php endforeach; ?>
		</div>
		<hr class="soft"/>

	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
		<?php foreach ($MenuProduk as $mp) : ?>  
			<li class="span3">
			  <div class="thumbnail">
				<a href="<?= base_url('produk/detailproduk'); ?>"><img src="<?= base_url($mp['gambar']);?>" alt=""/></a>
				<div class="caption">
				  <h5><?= $mp['nama_barang']; ?></h5>
				  <p> 
				  <?= $mp['deskripsi']; ?> 
				  </p>
				   <h4 style="text-align:center"><a class="btn" href="<?= base_url('produk/detailproduk'); ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
				</div>
			  </div>
			</li>
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
