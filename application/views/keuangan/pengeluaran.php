<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newPemasukanModal"><i class="fas fa-fw fa-plus"></i> Add new transaction</a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?php   
            // Penentuan ID KAS
                $idnow = substr($maxid['maxid'],3) + 1;
                $idkas = "KAS".sprintf("%08s",$idnow);
            ?>

            <?= form_error('jumlah', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('harga', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>


    <!-- Begin Tabel Resposive -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Pengeluaran</h6>
            </div>
            <div class="card-body">
            <!-- Card Body -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">User</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Jumlah</th>  
                        <th scope="col">Harga Perunit</th>  
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <form action="<?= base_url('keuangan/savepemasukancart'); ?>" method="post">
                        <?php $i = 1; $total = 0; ?>
                        <?php foreach ($keuangan as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= date('d M Y',strtotime($m['tanggal'])); ?></td>
                            <td><?=$m['id_admin']; ?></td>
                            <td><?= ucfirst($m['keterangan'])   ; ?></td>
                            <td><?= "Rp " . number_format($m['harga'],2,',','.') ; ?></td>
                            <td><?= $m['jumlah']; ?></td>
                            <td><?php $subtotal = $m['harga'] * $m['jumlah']; $total += $subtotal; ?> <?= "Rp " . number_format($subtotal,2,',','.') ; ?></td>  
                            <td>
                                <a href="" data-toggle="modal" data-target="#editPemasukanModal<?= $m['id']?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                                <a href="<?= base_url('keuangan/deletePengeluaran/'.$m['id']); ?>" class="badge badge-danger"><i class="far fa-fw fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </form>
                  </tbody>
                  <tfoot>
                        <tr>
                            <input type="hidden" name="idkas" value="<?= $idkas?>">
                            <th scope="col" colspan="6" class="align-center" >TOTAL</th>
                            <th scope="col" colspan="2" class="align-center" >
                                <input type="hidden" name="total" value="<?= $total ?>"><?=  "Rp " . number_format($total,2,',','.') ;  ?>
                            </th>
                        </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">User</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Harga Perunit</th>  
                        <th scope="col">Jumlah</th>  
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            <!-- End Card Body -->
            </div> 
        </div>
    <!-- End Tabel Resposive -->

            

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- New Modal -->
<div class="modal fade" id="newPemasukanModal" tabindex="-1" role="dialog" aria-labelledby="newPemasukanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPemasukanModalLabel">Add New Pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('keuangan/pengeluaran'); ?>" method="post">
                <div class="modal-body">
                        
                    <div class="form-group">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah barang yang di beli">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga barang yang di beli">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan">
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idkas" value="<?= $idkas?>">
                    <input type="hidden" name="idadmin" value="<?=$user['id']?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<!-- End New Modal -->
<!-- edit Modal -->
<?php foreach ($keuangan as $em) : ?>
    <div class="modal fade" id="editPemasukanModal<?= $em['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editPemasukanModal<?= $em['id'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPemasukanModal<?= $em['id'] ?>Label">Edit Pemasukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('keuangan/editPengeluaran/'.$em['id']); ?>" method="post">
                    <div class="modal-body">
                            
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $em['jumlah'] ?>" id="jumlah" name="jumlah" placeholder="Jumlah barang yang di beli">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $em['harga'] ?>" id="harga" name="harga" placeholder="Harga barang yang di beli">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $em['keterangan'] ?>" id="keterangan" name="keterangan" placeholder="keterangan">
                        </div>
    
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idkas" value="<?= $idkas?>">
                        <input type="hidden" name="idadmin" value="<?=$user['id']?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
<?php endforeach; ?>
<!-- End edit Modal -->