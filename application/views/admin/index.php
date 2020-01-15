<!-- Begin Page Content -->
<div class="container-fluid">

    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= base_url('keuangan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-fw fa-plus"></i> Add new transaction</a>
    </div>

    
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan bulan ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp " . number_format($kasm['0']['saldo'],0 ,',','.') ;?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan Tahun ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= "Rp " . number_format($kasy['0']['saldo'],0 ,',','.') ;?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran bulan ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= "Rp " . number_format($kask,0 ,',','.') ;?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Transaksi m/k</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $masuk['masuk']?> / <?= $keluar['keluar']?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

        <!-- Content Row -->
 
        
            <!-- Recent Login -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Login terakhir hari ini</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <!-- Card body -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="<?= base_url('keuangan/savepemasukancart'); ?>" method="post">
                                    <?php $i = 1; $total = 0; ?>
                                    <?php foreach ($log as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $m['name']; ?></td>
                                        <td><?= $m['email']; ?></td>
                                        <td><?= $m['time']; ?></td>
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
            <!-- end Recent Login -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 