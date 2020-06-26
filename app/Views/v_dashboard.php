
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $total_profile; ?></h3>
                            <p>Profile</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <a href="<?= base_url('home/profil') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> 
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                        <h3><?php echo $total_cuti; ?></h3>
                            <p>Cuti</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        <a href="<?= base_url('izin/cuti') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                        <h3><?php echo $total_perjalanan; ?></h3>
                            <p>Perjalanan Bisnis</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        <a href="<?= base_url('izin/perjalanan_bisnis') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                        <h3><?php echo $total_user; ?></h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Grafik Izin</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" width="100%" height="45"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Izin Terakhir </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Tipe Izin</th>
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($latest_izin as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value['id_izin']; ?></td>
                                                <td><?= $value['nik']; ?></td>
                                                <td><?= $value['izin_type'] == 1 ? 'Cuti':'Perjalanan Bisnis'; ?></td>
                                                <td><?= $value['start_date']; ?></td>
                                                <td><?= $value['end_date']; ?></td>
                                                <td><?= $value['status']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>