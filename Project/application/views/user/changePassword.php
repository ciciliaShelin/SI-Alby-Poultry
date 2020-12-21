<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?= base_url('produk/semuaproduk'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active"><?= $title; ?></li>
    </ul>
    <h3 class="h3 mb-4 text-gray-800"><?= $title; ?></h3>	
    <?= $this->session->flashdata('message'); ?>
	<div class="well">
        <div class="row">
		    <div class="span4">

            <form action="<?= base_url('user/change_password'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                   
                <div class="control-group">
                    <label class="control-label" for="current_password">Current Password </label>
                    <div class="controls">
                    <input type="password" id="current_password" name="current_password" placeholder="Password saat ini">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>	 
                
                <div class="control-group">
                    <label class="control-label" for="new_password1">New Password </label>
                    <div class="controls">
                    <input type="password" id="new_password1" name="new_password1" placeholder="Password Baru">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="new_password2">Repeat New Password </label>
                    <div class="controls">
                    <input type="password" id="new_password2" name="new_password2" placeholder="Ulangi Password Baru">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn">Save</button>
                <a class="btn " href="<?= base_url('user/akun'); ?>">Batal</a>
                </div>
            </form>
                
            </div>
		</div>
    </div>
        <!-- /.container-fluid -->

      </div>
      </div>
</div>