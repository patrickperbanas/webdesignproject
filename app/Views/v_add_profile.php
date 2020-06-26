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
        <?php
          if(session()->get('role')==1) { ?>
            <h3 class="card-title">Tambah Data</h3>
        <?php } ?>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url('home/simpan_profile') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>NIK</label>
                    <input name="nik" class="form-control" placeholder="Masukkan NIK" autocomplete='off'> 
                </div>

                <div class="form-group">
                    <label>Nama</label> 
                    <input name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" autocomplete='off'>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control datetimepicker-input" id="datepicker1"/>
                </div>

                <?php
                 if(session()->get('role')==1) { ?>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" name='jabatan'>
                            <option value='Admin'> Admin</option>
                            <option value='Manager'>Manager</option>
                            <option value='Staff'>Staff</option>
                        </select>
                </div>
               <?php } ?>
                <!-- to do only can input number -->
               
                <div class="form-group">
                    <label>Kuota Cuti</label>
                    <input name="kuota_cuti" pattern="{0-9}" class="form-control" placeholder="Masukkan Kuota Cuti Berapa Hari.." autocomplete='off'> 
                </div>
               

                <div class="form-group">
                    <label>Histori Perjalanan</label>
                    <textarea name="history_perjalanan" class="form-control" rows="3" placeholder="Masukkan Histori Perjalanan"></textarea>
                </div>
               
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
