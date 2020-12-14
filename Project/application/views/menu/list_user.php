<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<p class="mb-4">Tabel di bawah ini berisi daftar para user Web Alby Poultry</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
  </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" >
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                            <?php foreach ($DaftarUser as $mp) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $mp['name']; ?></td>
                                    <td><?= $mp['email']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url("admin/detail_user/".$mp['id_user']);?>" class="badge badge-success">detail</a>
                                    </td>
                                </tr>
                        <?php $i++; ?>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
 
</div>

</div>
<!-- /.container-fluid -->
