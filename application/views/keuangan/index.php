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
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Harga Perunit</th>  
                        <th scope="col">Jumlah</th>  
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
                            <!-- <td><?= date('d M Y',strtotime($m['tanggal'])); ?></td> -->
                            <!-- <td><?= $m['email']; ?></td> -->
                            <td><?=$m['id_pemasukan']; ?></td>
                            <td><?= ucwords($m['menu']); ?></td>
                            <td><?= ucfirst($m['keterangan'])   ; ?></td>
                            <td><?= "Rp " . number_format($m['harga'],2,',','.') ; ?></td>
                            <td><?= $m['jumlah']; ?></td>
                            <td><?php $subtotal = $m['harga'] * $m['jumlah']; $total += $subtotal; ?> <?= "Rp " . number_format($subtotal,2,',','.') ; ?></td>  
                            <td>
                                <!-- <i href="" class="badge badge-success"><i class="far fa-edit"></i></a> -->
                                <a href="<?= base_url('keuangan/deletePemasukanCart/'.$m['id']); ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ?')"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <tr>
                            <input type="hidden" name="idkas" value="<?= $idkas?>">
                            <input type="hidden" name="idadmin" value="<?=$user['id']?>">
                            <th scope="col" colspan="6" class="align-center" >TOTAL</th>
                            <th scope="col" class="align-center" >
                                <input type="hidden" name="total" value="<?= $total ?>"><?=  "Rp " . number_format($total,2,',','.') ;  ?>
                            </th>
                            <th scope="col"> 
                                <input type="submit" value="Save" class="btn btn-success btn-sm"> 
                                <a href="<?= base_url('keuangan/deletePemasukanCartAll/'.$idkas); ?>"  value="Simpan" class="btn btn-danger btn-sm">Reset</a>
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
            <form action="<?= base_url('keuangan'); ?>" method="post">
                <div class="modal-body">
                        
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                
                                <option value="<?= $m['id']; ?>">
                                    <div class="col-sm-8"><?= "Rp " . number_format($m['harga'],2,',','.'); ?></div>
                                    <div class="col-sm-4"><?= " - " .ucwords($m['menu']); ?></div>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah terjual">
                    <input type="hidden" name="idkas" value="<?= $idkas?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan">
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