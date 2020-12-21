<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?= base_url('produk/semuaproduk'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active"><?= $title; ?></li>
    </ul>
    <h4 class="h3 mb-4 text-gray-800"><?= $title; ?> for <?= $this->session->userdata('reset_email'); ?> </h4>	
    <?= $this->session->flashdata('message'); ?>
	<div class="well">
        <div class="row">
		    <div class="span9">

            <form class="user" action="<?= base_url('auth/changepassword'); ?>" method="post" >
                <div class="modal-body">
                   
                <div class="control-group">
                    <label class="control-label" for="password1">Enter New Password </label>
                    <div class="controls">
                    <input type="password" id="password1" name="password1" placeholder="Masukkan password baru">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>	

                <div class="control-group">
                    <label class="control-label" for="password2">Repeat Password </label>
                    <div class="controls">
                    <input type="password" id="password2" name="password2" placeholder="Ulangi password">
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>	 
                
                <button type="submit" class="btn">Change Password</button>  <hr class="soft"/>

                </div>
            </form>
                
            </div>
		</div>
    </div>
        <!-- /.container-fluid -->

      </div>
      </div>
</div>