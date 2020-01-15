<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newMenusModal"><i class="fas fa-fw fa-plus"></i> Add new transaction</a>
    </div>



    <div class="row">
        <div class="col-md">
            <?= form_error('menus', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('harga', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- TABEL RESPONSIF -->
            <div class="card shadow mb-6">
                
                <!-- Card Header - Accordion -->
                <a href="#dataTable" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="dataTable">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel menu makanan dan minuman</h6>
                </a>
                <div class="card-body">
                    <!-- Card body -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr role="row">
                                <th rowspan="1" colspan="1">NO</th>
                                <th rowspan="1" colspan="1">Menu</th>
                                <th rowspan="1" colspan="1">Harga</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($menus as $m) : ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $i; ?></td>
                                    <td><?= strtoupper($m['menu']); ?></td>
                                    <td><?= "Rp " . number_format($m['harga'],2,',','.'); ?></td>
                                    <td>
                                        <a href="" class="badge badge-success" data-toggle="modal" data-target="#newMenusModal<?=$m['id']?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ?')"><i class="far fa-edit"></i></a>
                                        <a href="<?= base_url('menus/deleteMenus/'.$m['id']); ?>" class="badge badge-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr role="row">
                                <th rowspan="1" colspan="1">NO</th>
                                <th rowspan="1" colspan="1">Menu</th>
                                <th rowspan="1" colspan="1">Harga</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                    <!-- End Card body -->
                </div>
            </div>
            <!-- TABEL RESPONSIF -->
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newMenusModal" tabindex="-1" role="dialog" aria-labelledby="newMenusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenusModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menus'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menus" placeholder="Nama Makanan / Minuman">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="harga" placeholder="harga">
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
<!-- Modal EDIT-->
<?php foreach ($menus as $ms) : ?>
    <div class="modal fade" id="newMenusModal<?=$ms['id']?>" tabindex="-1" role="dialog" aria-labelledby="newMenusModal<?=$ms['id']?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenusModal<?=$ms['id']?>Label">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menus/editMenus/'.$ms['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menus" value="<?=$ms['menu']?>" placeholder="Nama Makanan / Minuman">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="harga" value="<?=$ms['harga']?>" placeholder="harga">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
<?php endforeach;?>