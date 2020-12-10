<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5" >
					<br>
					<br>
					<br>
					
          <p>Anda belum punya akun ? Yuk Join!<p>
					<p>Dengan bergabung dengan kami, Anda akan lebih mudah untuk mengorganisir stok ketersediaan barang kami</p>
          <a href="<?php echo base_url('daftar/index'); ?>" class="btn btn-primary">Daftar Sekarang</a>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">Selamat Datang di Website Alby Poultry</h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
              <?php echo $this->session->flashdata('pesan') ?>
            <form class="user" method="post" action="<?php echo base_url('login/index');?>">
                    <div class="form-group">
                      <input type="text" name ="username"  class="form-control form-control-user" id="exampleInputEmail" placeholder="Username">
                      <?php echo form_error('username', '<div class="text_danger small">','</div>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" name ="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    
                    <label>
                        <input type="checkbox"  name="login">Remember Me</label>
                              <button class="btn btn-primary btn-user btn-block">
							Login
						</button>
    
            </form>
            </div>
            
					</div>
				</div>
			</div>
		</section>