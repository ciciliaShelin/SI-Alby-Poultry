           <!-- QUERY MENU PRODUK -->
		   <?php 
        $queryMenu = "SELECT * FROM barang ";
        $MenuProduk = $this->db->query($queryMenu)->result_array();
        ?>
		<div class="span9">		
			<div class="well well-small">
			<h4>Featured Products <small class="pull-right"></small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			<div class="item active">
			<ul class="thumbnails">
			<?php foreach ($MenuProduk as $mp) : ?>  
			<li class="span3">
			<div class="thumbnail">
				<i class=""></i>
					<a href="<?= base_url("produk/detailproduk/".$mp['id_barang']); ?>"><img src="<?= base_url('uploads/produk/') . $mp['gambar'];?>" alt="" style="width: 300px; height:250px;"></a>
					<div class="caption">
					  <h5><?= $mp['nama_barang']; ?></h5>
					  <h4><a class="btn" href="<?= base_url("produk/detailproduk/".$mp['id_barang']); ?>">VIEW</a> <span class="pull-right">$222.00</span></h4>
					</div>
				</div>
			</li>
			<?php endforeach; ?>

			  </ul>
			  </div>
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>

		<!-- <h4>Latest Products </h4>
			  <ul class="thumbnails">
				<li class="span3">
				  <div class="thumbnail">
					<a  href="<?= base_url('produk/detailproduk'); ?>"><img src="<?= base_url('assets/'); ?>themes/images/products/6.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p> 
						Lorem Ipsum is simply dummy text. 
					  </p>
					 
					  <h4 style="text-align:center"><a class="btn" href="<?= base_url('produk/detailproduk'); ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
					</div>
				  </div>
				</li>

			  </ul>	 -->

		</div>
		</div>
	</div>
</div>
