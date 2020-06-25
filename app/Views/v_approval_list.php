<div class="col-sm-12">

<?php
    if(!empty(session()->getFlashdata('success'))) {  ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($izin as $key => $value) { 
            if($value['status'] == 'Waiting Approval') {?>
            <tr>
                <td><?= $value['id_izin']; ?></td>
                <td><?= $value['nik']; ?></td>
                <td><?= $value['izin_type'] == 1 ? 'Cuti':'Perjalanan Bisnis'; ?></td>
                <td><?= $value['start_date']; ?></td>
                <td><?= $value['end_date']; ?></td>
                <td><?= $value['status']; ?></td>
                <td><a href="<?= base_url('approval/view/'.$value['id_izin']) ?>" class="btn btn-warning">View</a></td>
            </tr>
        <?php } }?>
        </tbody>
    <table>

</div>
