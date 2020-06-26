<?php if(!empty(session()->getFlashdata('success'))) { ?>
    <div class="alert alert-success">
      <?php
        echo session()->getFlashdata('success');
      ?>
    </div>
<?php } ?>

<?php
    $inputs = session()->getFlashdata('inputs');
    $errors = session()->getFlashdata('errors');
    if(!empty($errors)) { ?>
        <div class="alert alert-danger">
        Ada Kesalahaan Saat Input Data Yaitu :
        <ul>
            <?php foreach($errors as $error) {?>
            <li><?= esc($error) ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url('home/update_profile/'.$profil['id_profile']); ?>" method="post">
            <div class="card-body">
                <input name="id_profile" type='hidden' value="<?= $profil['id_profile'] ?>" class="form-control" placeholder="Masukkan NIK" autocomplete='off'> 
                <div class="form-group">
                    <label>NIK</label>
                    <input name="nik" value="<?= $profil['nik'] ?>" class="form-control" placeholder="Masukkan NIK" autocomplete='off'> 
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" value="<?= $profil['nama'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap" autocomplete='off'>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" value="<?= $profil['alamat'] ?>" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" value="<?= $profil['tgl_lahir'] ?>" class="form-control datetimepicker-input" id="datepicker1"/>
                </div>

                <?php
                    if(session()->get('role')==1) { ?>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input name="jabatan" value="<?= $profil['jabatan'] ?>" class="form-control" placeholder="Masukkan Jabatan" autocomplete='off'>
                </div>
               <?php } ?>

                <div class="form-group">
                    <label>Kuota Cuti</label>
                    <input name="kuota_cuti" value="<?= $profil['kuota_cuti'] ?>" pattern="{0-9}" class="form-control" placeholder="Masukkan Kuota Cuti" autocomplete='off'>
                </div>

                <div class="form-group">
                    <label>Histori Perjalanan</label>
                    <textarea name="history_perjalanan" value="<?= $profil['history_perjalanan'] ?>" class="form-control" rows="3" placeholder="Masukkan Histori Perjalanan" autocomplete='off'></textarea>
                </div>
               
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
