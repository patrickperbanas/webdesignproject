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
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Jabatan</th>
                <th>Kuota Cuti</th>
                <th>Histori Perjalanan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($profil as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['nik']; ?></td>
                <td><?= $value['nama']; ?></td>
                <td><?= $value['tgl_lahir']; ?></td>
                <td><?= $value['alamat']; ?></td>
                <td><?= $value['jabatan']; ?></td>
                <td><?= $value['kuota_cuti']; ?></td>
                <td><?= $value['history_perjalanan']; ?></td>
                <td>
                    <a href="<?= base_url('home/edit_profile/'.$value['id_profile']) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('home/delete_profile/'.$value['id_profile']) ?>" class="btn btn-danger" onClick="return confirm('Apakah Ingin Hapus Data')">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    <table>

</div>
