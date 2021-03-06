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

            <?= $this->session->flashdata('message'); ?>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <!-- <th scope="col">Tanggal</th> -->
                        <th scope="col">Keterangan</th>
                        <th scope="col">Harga Perunit</th>  
                        <th scope="col">Jumlah</th>  
                        <th scope="col">Total</th>
                        <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                     <form action="<?= base_url('keuangan/savepemasukancart'); ?>" method="post">
                        <?php $i = 1; $total = 0; ?>
                        <?php foreach ($keuangan as $mm) : ?>
                        <?php foreach ($mm as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <!-- <td><?= date('d M Y',strtotime($m['tanggal'])); ?></td> -->
                            <td><?= ucfirst($m['keterangan'])   ; ?></td>
                            <td><?= "Rp " .$m['subharga']; ?></td>
                            <td><?= $m['jumlah']; ?></td>
                            <td><?php $ss = $m['subharga']*$m['jumlah'];  ?> <?= "Rp " . number_format($ss,0,',','.') ; ?></td>  
                            <td>
                                <!-- <i href="" class="badge badge-success"><i class="far fa-edit"></i></a> -->
                                <!-- <a href="<?= base_url('keuangan/deletePemasukanCart/'.$m['id']); ?>" class="badge badge-danger"><i class="far fa-trash-alt" onclick="return confirm('Apakah anda yakin untuk menghapus data ?')"></i></a> -->
                            </td>
                        </tr>
                        <?php $i++; $total += $ss; ?>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                        <tr>
                            <input type="hidden" name="idkas" value="<?= $idkas?>">
                            <input type="hidden" name="idadmin" value="<?=$user['id']?>">
                            <th scope="col" colspan="3" class="align-center" >TOTAL</th>
                            <th scope="col" class="align-center" >
                                <input type="hidden" name="total" value="<?= $total ?>"><?=  "Rp " . number_format($total,0,',','.') ;  ?>
                            </th>
                            <th scope="col"> 
                                <a href="<?= base_url('keuangan/kas'); ?>"  value="Simpan" class="btn btn-warning btn-sm">Kembali</a>
                            </th>
                        </tr>
                    </form>
                </tbody>
            </table>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newPemasukanModal" tabindex="-1" role="dialog" aria-labelledby="newPemasukanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPemasukanModalLabel">Add New Pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('keuangan/pemasukanLuarUsaha'); ?>" method="post">
                <div class="modal-body">
                        
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Jumlah Pemasukan">
                    <input type="hidden" name="idkas" value="<?= $idkas?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
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