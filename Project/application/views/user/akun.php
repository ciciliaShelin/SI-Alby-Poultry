<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?= base_url('produk/semuaproduk'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active"><?= $title; ?></li>
    </ul>
    <h3 class="h3 mb-4 text-gray-800"><?= $title; ?></h3>	
    <?= $this->session->flashdata('message'); ?>
	<div class="well">

        <div class="row">
		    <div class="span2.5">
                <img class="card-img-top" src="<?= base_url('uploads/profile/') .$user['image']; ?>" class="card-img" style="width:250px; height: 220px;">   
            </div>
		    <div class="span4">
                <h5 class="card-title">Nama :<?= $user['name']; ?></h5>
                <p class="card-text">Email :<?= $user['email']; ?></p>
                <p class="card-text">Alamat :<?= $user['alamat']; ?></p>
                <p class="card-text">No Telp :<?= $user['no_tlp']; ?></p>
                <p class="card-text">Jenis Kelamin :<?= $user['jenis_kelamin']; ?></p>
                <p class="card-text"><small class="text-muted">member since <?= date('d F Y', $user['date_creater']); ?></small></p>
            </div>
            <div class="span4">
                <a class="btn " data-toggle="modal" data-target="#editModal"  role="button">Edit</a> 
                <a href="<?= base_url('user/change_password'); ?>" class="btn " role="button">Change Password</a>
            </div>
		</div>


    </div>
        <!-- /.container-fluid -->

      </div>
      </div>
</div>

<!-- MODAL EDIT AKUN PROFILE -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editModalLabel">Edit Profile</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('user/edit_user'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?= $user['email']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama" value="<?= $user['name']; ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin" value="<?= $user['jenis_kelamin']; ?>" readonly>
                    </div>
                        <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="LAKI-LAKI" > LAKI-LAKI
                        <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value= "PEREMPUAN"> PEREMPUAN
<br> <br>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="No Telp" value="<?= $user['no_tlp']; ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $user['alamat']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <input type="file"  id="image"  name="image" >
                    </div>
                   

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- MODAL CHANGE PASSWORD -->
<div class="modal fade" id="ubahPasswordModal" tabindex="-1" aria-labelledby="ubahPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="ubahPasswordModalLabel">Change Password</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

         