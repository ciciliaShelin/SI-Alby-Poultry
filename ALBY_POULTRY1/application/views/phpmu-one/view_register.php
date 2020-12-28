<?= $this->session->flashdata('message'); ?>

<p class="sidebar-title"> Pendaftaran Members</p>
<div class="alert alert-info"><b>PENTING!</b> - Contact information </div>
<br>
<?php $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');?>
<?= form_open_multipart('auth/register',$attributes); ?>
        <div class="form-group">
            <label for='inputEmail3' class='col-sm-3 control-label'>Nama Lengkap</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-12'>
                <input type="text" class="form-control" name="c" value="<?= set_value('c'); ?>">
                <?= form_error('c', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>No Telpon/Hp</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-6'>
                <input type="number" class='number form-control' name="j" value="<?= set_value('j'); ?>" minlength="10">
                <?= form_error('j', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='inputPassword3' class='col-sm-3 control-label'>Alamat</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-lg-12'>
                <input type="text" class='form-control' name="e" value="<?= set_value('e'); ?>">
                <?= form_error('e', '<small class="text-danger pl-3">', '</small>'); ?>
            </div></div>
        </div>

        <div class='form-group'>
            <label for='inputPassword3' class='col-sm-3 control-label'>Kota</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-lg-12'>
                <select class='form-control' name="h" required value="<?= set_value('h'); ?>">
                    <option value="">- Pilih -</option>
                   <?php foreach ($kota as $rows) : ?>
                        <option value="<?=$rows['kota_id'];?>"><?=$rows['nama_kota'];?></option>
                        <?= form_error('h', '<small class="text-danger pl-3">', '</small>'); ?>
                    <?php endforeach; ?>
                </select>
            </div></div>
        </div>

        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Email</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-12'>
                <input type="email" class=' email form-control' name="email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Username</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-6'>
                <input type="text" class='form-control' name="a" value="<?= set_value('a'); ?>" onkeyup="nospaces(this)" >
                <?= form_error('a', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            </div>
        </div>


        <div class='form-group'>
            <label for='inputEmail3' class='col-sm-3 control-label'>Password</label>
            <div class='col-sm-9'>
            <div style='background:#fff;' class='input-group col-sm-6'>
                <input type="password" class="form-control" onkeyup="nospaces(this)" name="b" >
                <?= form_error('b', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            </div>
        </div>

        <br>
        <div class='form-group'>
            <div class='col-sm-offset-2'>
                <button type="submit" name='submit' class='btn btn-primary'>Daftar</button>
                <a  class='btn btn-default' href=<?= base_url('auth/login'); ?> >Sudah Punya Akun?</a>
            </div>
        </div>
        <?= form_close(); ?>
