
    <div class="site-section" id="products-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h3 class="section-sub-title">Produk Populer</h3>
            <h2 class="section-title mb-3">Produk Kami</h2>
            <p>Kami menyediakan berbagai macam produk peternakan. Berikut adalah produk-produk dari toko Alby Poultry</p>
          </div>
        </div>


                <!-- QUERY MENU PRODUK -->
                <?php 
        $queryMenu = "SELECT barang.*, jenis_barang.nama_jenis
                        FROM barang JOIN jenis_barang 
                          ON barang.jenis_id = jenis_barang.id_jenis
                      
                    ";
        $menuProduk = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- LOOPING MENU -->
          <div class="row">
            <?php foreach($menuProduk as $mp) : ?>
            <div class="col-lg-4 col-md-6 mb-5" >
              <div class="product-item"  >
                <figure>
                  <img src="<?= base_url($mp['gambar']);?>" alt="Image" class="img-fluid">
                </figure>
                <div class="px-4">
                  <h3><a href="#"><?= $mp['nama_barang']; ?></a></h3>
                  <div class="mb-3">
                    <span class="meta-icons mr-3"><a href="#" class="mr-2"><span class="icon-star text-warning"></span></a> 5.0</span>
                    <span class="meta-icons wishlist"><a href="#" class="mr-2"><span class="icon-heart"></span></a> 29</span>
                  </div>
                  <p class="mb-4"><?= $mp['deskripsi']; ?></p>
                  <div>
                    <a href="#" class="btn btn-black mr-1 rounded-0">Cart</a>
                    <a href="#" class="btn btn-black btn-outline-black ml-1 rounded-0">View</a>
                  </div>
                </div>
              </div>              
            </div>
            <?php endforeach; ?>    
          </div>
        </div>
      </div>


