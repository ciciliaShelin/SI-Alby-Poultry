<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?= base_url('produk/semuaproduk'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active"><?= $title; ?></li>
    </ul>
    <h3 class="h3 mb-4 text-gray-800"><?= $title; ?></h3>	
    <?= $this->session->flashdata('message'); ?>
	<div class="well">
        <div class="row">
		    <div class="span9">

            <form action="<?= base_url('auth/forgotPass'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                   
                <div class="control-group">
                    <label class="control-label" for="email">Email </label>
                    <div class="controls">
                    <input type="text" id="email" name="email" placeholder="Masukkan email">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>	 
                
                <button type="submit" class="btn">Reset Password</button>  <hr class="soft"/>
                <a href="<?= base_url('auth/login'); ?>" style="text-decoration:underline">back to login</a>
                </div>
            </form>
                
            </div>
		</div>
    </div>
        <!-- /.container-fluid -->

      </div>
      </div>
</div>