<div class="col-sm-12">

    <table class="table table-bordered table-responsive">
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
                    <a href="" class="btn btn-warning">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    <table>

</div>
