	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?= base_url('produk/semuaproduk'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
    <h3> Registration</h3>	
    <?= $this->session->flashdata('message'); ?>
	<div class="well">

	<form class="user" method="POST" action="<?= base_url('auth/registration'); ?>" >
	
		<div class="control-group">
			<label class="control-label" for="name">Name </label>
			<div class="controls">
              <input type="text" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
              <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
		</div>

		<div class="control-group">
            <label class="control-label" for="email">Email </label>
            <div class="controls">
            <input type="text" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>	

		<div class="control-group">
            <label class="control-label" for="email">Jenis Kelamin </label>
            <div class="controls">
            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="LAKI-LAKI" > LAKI-LAKI
            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value= "PEREMPUAN"> PEREMPUAN
            <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>

	    <div class="control-group">
            <label class="control-label" for="password1">No Telepon </label>
            <div class="controls">
            <input type="text" id="no_tlp" name="no_tlp" placeholder="No Telepon">
            <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>	 

	    <div class="control-group">
            <label class="control-label" for="password1">Password </label>
            <div class="controls">
            <input type="password" id="password1" name="password1" placeholder="Password">
            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>	 
         
	    <div class="control-group">
            <label class="control-label" for="password2">Ulangi Password </label>
            <div class="controls">
            <input type="password" id="password2" name="password2" placeholder="Ulangi Password">
            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        	  
	    <!-- <div class="control-group">
            <label class="control-label" for="image">Foto Profil </label>
            <div class="controls">
            <input type="file" id="image" name="image" >
            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
	    </div>	   -->
	
	    <button type="submit" class="btn btn-success btn-user ">
            Register Account
        </button>		

    </form>
    
    <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/forgotPass'); ?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/login'); ?>">Already have an account? Login!</a>
                        </div>

</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->