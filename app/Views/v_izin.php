<div class="col-sm-12">
<a href="<?= base_url('izin/tambah?type='.$type) ?>" class="btn btn-primary">Tambah Data</a>

<br></br>
<?php
    if(!empty(session()->getFlashdata('success'))) {  ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
<?php } ?>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <?php if($type == 1){ ?>
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Tipe Izin</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($cuti as $key => $value) { ?>
            <tr>
                <td><?= $value['id_izin']; ?></td>
                <td><?= $value['nik']; ?></td>
                <td><?= $value['izin_type'] == 1?'Cuti':'Perjalanan Bisnis'; ?></td>
                <td><?= $value['start_date']; ?></td>
                <td><?= $value['end_date']; ?></td>
                <td><?= $value['status']; ?></td>
                <td>
                <?php if($value['status'] != "Canceled" && $value['status'] != "Rejected"){ ?>
                    <a href="<?= base_url('izin/edit/'.$value['id_izin'].'/?type='.$type) ?>" class="btn btn-warning">Update</a>
                    <a href="<?= base_url('izin/cancel/'.$value['id_izin'].'/?type='.$type) ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin Ingin Cancel Izin?')">Cancel</a>
                <?php }else {?>
                    -
                <?php }?>
                </td>
            </tr>
        <?php } 
         } ?>

        <?php if($type == 2){ ?>
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Tipe Izin</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Estimasi Biaya</th>
                <th>Status</th>
                <th>Histori Perjalanan</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($cuti as $key => $value) { ?>
            <tr>
                <td><?= $value['id_izin']; ?></td>
                <td><?= $value['nik']; ?></td>
                <td><?= $value['izin_type'] == 1?'Cuti':'Perjalanan Bisnis'; ?></td>
                <td><?= $value['start_date']; ?></td>
                <td><?= $value['end_date']; ?></td>
                <td><?= $value['estimasi_biaya']; ?></td>
                <td><?= $value['status']; ?></td>
                <td><?= $value['history_perjalanan']; ?></td>
                <td>
                <?php if($value['status'] != "Canceled" && $value['status'] != "Rejected"){ ?>
                    <a href="<?= base_url('izin/edit/'.$value['id_izin'].'/?type='.$type) ?>" class="btn btn-warning">Update</a>
                    <a href="<?= base_url('izin/cancel/'.$value['id_izin'].'/?type='.$type) ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin Ingin Cancel Izin?')">Cancel</a>
                <?php }else {?>
                    -
                <?php }?>
                </td>
            </tr>
        <?php } 
        } ?>
        </tbody>
    <table>

</div>
