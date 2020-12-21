<div class="span9">
     <div class="row">
    <ul class="breadcrumb">
		<li><a href="<?= base_url('produk/semuaproduk'); ?>">Home</a> <span class="divider">/</span></li>
		<li class="active"><?= $title; ?></li>
    </ul>
    <h3 class="h3 mb-4 text-gray-800"><?= $title; ?></h3>	
    <?= $this->session->flashdata('message'); ?>
	<div class="well">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          


         
                <div class="col-lg-8">
                    
                    <form action="<?= base_url('admin/edit') ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group row">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Full name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-10">
                            <div class="row">
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $user['jenis_kelamin']; ?>" readonly>
                                <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="col-sm-8">
                              <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="LAKI-LAKI" > Laki-laki
                              <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value= "PEREMPUAN"> Perempuan
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">No Telp</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $user['no_tlp']; ?>">
                            <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-2">Picture</div>
                          <div class="col-sm-10">
                            <div class="row">
                              <div class="col-sm-3">
                                <img src="<?= base_url('uploads/profile/') . $user['image']; ?>" class="img-thumbnail" style="width:150px; height: 150px;">
                              </div>
                              <div class="col-sm-9">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="image" name="image">
                                  <label for="image" class="custom-file-label">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>

                    </form>

                </div>
          </div>



        </div>

    </div>

</div>
</div>
</div>
</div>
       

