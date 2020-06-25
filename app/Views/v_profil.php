<div class="col-sm-12">
<?php
    if(session()->get('role')==1) { ?>
        <a href="<?= base_url('home/tambah_profil') ?>" class="btn btn-primary">Tambah Data</a>
<?php } ?>
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
                <td>
                <?php if(session()->get('role')!=1) {if($value['nik'] == session()->get('nik')){?>
                    <a href="<?= base_url('home/edit_profile/'.$value['id_profile']) ?>" class="btn btn-primary">Edit</a>
                <?php }else{?>
                    <a href="<?= base_url('home/view_profile/'.$value['id_profile']) ?>" class="btn btn-warning">View</a>
                <?php }}else{?>
                    <a href="<?= base_url('home/edit_profile/'.$value['id_profile']) ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= base_url('home/view_profile/'.$value['id_profile']) ?>" class="btn btn-warning">View</a>
                <?php }?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    <table>

</div>
