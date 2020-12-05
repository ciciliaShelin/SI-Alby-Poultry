	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?= base_url('produk/semuaproduk'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<div class="well">
	<!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
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
	
	    <button type="submit" class="btn btn-success btn-user ">
            Register Account
        </button>		

    </form>
    
    <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
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