

<div class="span9">
<ul class="breadcrumb">
	<li><a href="<?= base_url('user'); ?>">Home</a> <span class="divider">/</span></li>
	<li class="active"> <?= $title; ?></li>
</ul>
<h3>  <?= $title; ?> <a href="<?= base_url('produk/semuaproduk'); ?>" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Lanjutkan Belanja </a></h3>	
<hr class="soft"/>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered">
    <tr>
        <th> I AM ALREADY REGISTERED </th>
    </tr>
    <tr>
        <td>
            <form class="user" method="POST" action="<?= base_url('auth/login'); ?>">
                <div class="control-group">
                    <label class="control-label" for="inputUsername">Email</label>
                    <div class="controls">
                        <input type="text" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Sign in</button> OR <a href="<?= base_url('auth/registration'); ?>" class="btn">Register Now!</a>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <a href="<?= base_url('auth/forgotPass'); ?>" style="text-decoration:underline">Forgot password ?</a>
                    </div>
                </div>
            </form>
        </td>
    </tr>
</table>
</div>
</div></div>
</div>
