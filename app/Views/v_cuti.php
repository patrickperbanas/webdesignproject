<div class="col-sm-12">
<a href="<?= base_url('home/tambah_profil') ?>" class="btn btn-primary">Tambah Data</a>

<br></br>
<?php
    if(!empty(session()->getFlashdata('success'))) {  ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    }
<?php } ?>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Tipe Izin</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
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
                <td><?= $value['izin_type']; ?></td>
                <td><?= $value['start_date']; ?></td>
                <td><?= $value['end_date']; ?></td>
                <td><?= $value['status']; ?></td>
                <td><?= $value['history_perjalanan']; ?></td>
                <td>
                    <a href="" class="btn btn-warning">Edit</a>
                    <a href="" class="btn btn-danger" onClick="return confirm('Apakah Ingin Hapus Data')">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    <table>

</div>
