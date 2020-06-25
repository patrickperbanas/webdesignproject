<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Detail Pegawai</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table clas="table">
            <tbody>
            <tr>
                <td style="width: 10px"><h6>Nama</h6></td>
                <td><h6>:</h6></td>
                <td><h6><?= $profil['nama'] ?></h6></td>
            </tr>
            <tr>
                <td><h6>Nik</h6></td>
                <td><h6>:</h6></td>
                <td><h6><?= $profil['nik'] ?></h6></td>
            </tr>
            <tr>
                <td><h6>Jabatan</h6></td>
                <td><h6>:</h6></td>
                <td><h6><?= $profil['jabatan'] ?></h6></td>
            </tr>
            <?php if($izin['izin_type'] == 1) {?>
            <tr>
                <td><h6>Kuota Cuti</h6></td>
                <td><h6>:</h6></td>
                <td><h6><?= $profil['kuota_cuti'] ?></h6></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
    <div class="card-header">
        <h3 class="card-title">Detail Izin</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table clas="table">
        <tbody>
        <tr>
            <td><h6>Jenis Izin</h6></td>
            <td><h6>:</h6></td>
            <td><h6><?= $izin['izin_type'] == 1? 'Cuti' : 'Perjalanan Bisnis' ?></h6></td>
        </tr>
        <tr>
            <td><h6>Dari</h6></td>
            <td><h6>:</h6></td>
            <td><h6><?= $izin['start_date'] ?></h6></td>
        </tr>
        <tr>
            <td><h6>Sampai</h6></td>
            <td><h6>:</h6></td>
            <td><h6><?= $izin['end_date'] ?></h6></td>
        </tr>
        <?php if($izin['izin_type'] != 1) {?>
        <tr>
            <td><h6>Estimasi Biaya</h6></td>
            <td><h6>:</h6></td>
            <td><h6>Rp. <?= number_format(intval($izin['estimasi_biaya']),2,',','.') ?></h6></td>
        </tr>
        <tr>
            <td><h6>Keterangan</h6></td>
            <td><h6>:</h6></td>
            <td><h6><?= $izin['history_perjalanan'] ?></h6></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
        </div>
        
    </div>
    <div class="card-footer">
        <a href="<?= base_url('approval/approve/'.$izin['id_izin']) ?>" class="btn btn-success" onClick="return confirm('Apakah Anda Yakin Ingin Menerima Izin ini?')">Approve</a>
        <a href="<?= base_url('approval/reject/'.$izin['id_izin']) ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin Ingin Menolak Izin ini?')">Reject</a>
    </div>
</div>