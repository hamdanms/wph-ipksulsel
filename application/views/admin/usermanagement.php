<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-fw fa-plus"></i> Add new transaction</a>
    </div>

    <?= $this->session->flashdata('message'); ?>

            <!-- Verifikasi User -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#verifikasi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="verifikasi">
                    <h6 class="m-0 font-weight-bold text-primary">Verifikasi User</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="verifikasi">
                    <div class="card-body">
                        <!-- Card body -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Verification</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="<?= base_url('keuangan/savepemasukancart'); ?>" method="post">
                                    <?php $i = 1; $total = 0; ?>
                                    <?php foreach ($datauser as $d) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= ucwords($d['name']); ?></td>
                                            <td><?= $d['token']; ?></td>
                                            <td>
                                                <a href="<?= base_url().'auth/verify?email='.$d['email'].'&token='.urlencode($d['token']) ?>" class="badge badge-warning">Verification</a>
                                            </td>
                                        </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                </form>
                            </tbody>
                        </table>
                        <!-- End Card body -->
                    </div>
                </div>
            </div>
            <!-- end Verifikasi User -->
            
            <!-- User Management -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#management" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="management">
                    <h6 class="m-0 font-weight-bold text-primary">User Management</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="management">
                    <div class="card-body">
                        <!-- Card body -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Is Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; $total = 0; ?>
                                <?php foreach ($detailuser as $du) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= ucwords($du['name']); ?></td>
                                        <td><?= $du['email']; ?></td>
                                        <td><?= $du['role']; ?></td>
                                        <td><?php if($du['is_active'] == 0) {echo "NO"; }else{  echo "YES" ;} ?></td>
                                        <td>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editMenuModal<?=$du['user_id']?>"><i class="far fa-edit"></i></a>
                                            <a href="<?= base_url('admin/deleteUser/'.$du['user_id']); ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin untuk menghapus <?= ucwords($du['name']); ?> ?')"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                                <tr>
                            </tbody>
                        </table>
                        <!-- End Card body -->
                    </div>
                </div>
            </div>
            <!-- end User Management -->

    



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newMenuModals" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<!-- end Modal -->

<!-- Modal -->
<?php foreach ($detailuser as $edu) : ?>
    <div class="modal fade" id="editMenuModal<?=$edu['user_id']?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMenuModalLabel">Edit User : <?= ucwords($edu['name']); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editUser/'.$edu['user_id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" value="<?= $edu['email'] ?>" name="email" placeholder="email" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" value="<?= $edu['name'] ?>" name="name" placeholder="Name">
                        </div>
                        
                        <div class="form-group">
                            <select name="role_id"  id="role_id" class="form-control">
                                <option >Select Role</option>
                                <?php foreach ($role as $rl) : ?>
                                    <?php if($edu['role_id'] == $rl['id'] ): ?>
                                        <option value="<?= $rl['id']; ?>" selected> <?= $rl['role']; ?> </option>
                                    <?php else:?>
                                        <option value="<?= $rl['id']; ?>" > <?= $rl['role']; ?> </option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <?php if ($edu['is_active']==1): ?>
                                    <input name="is_active" type="checkbox" value="1" class="custom-control-input" id="active<?=$edu['user_id']?>" checked>
                                <?php else: ?>
                                    <input name="is_active" type="checkbox" value="1" class="custom-control-input" id="active<?=$edu['user_id']?>" >
                                <?php endif; ?>
                                <label class="custom-control-label" for="active<?=$edu['user_id']?>">Is Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
<?php endforeach;?>
<!-- end Modal -->