<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php if($action == "edit"){ ?>
        <form role="form" action="<?= base_url('home/update_profile/'.$profil['id_profile']); ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>NIK</label>
                    <input name="nik" value="<?= $profil['nik'] ?>" class="form-control" placeholder="Masukkan NIK" required>
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" value="<?= $profil['nama'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" value="<?= $profil['alamat'] ?>" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" required></textarea>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" value="<?= $profil['tgl_lahir'] ?>" class="form-control datetimepicker-input" id="datepicker1" required />
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input name="jabatan" value="<?= $profil['jabatan'] ?>" class="form-control" placeholder="Masukkan Jabatan" required>
               </div>

                <!-- to do only can input number -->
                <div class="form-group">
                    <label>Kuota Cuti</label>
                    <input name="kuota_cuti" value="<?= $profil['kuota_cuti'] ?>" pattern="{0-9}" class="form-control" placeholder="Masukkan Kuota Cuti" required>
                </div>
               
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        <?php }else{?>
            <form role="form" action="<?= base_url('home/update_profile/'.$profil['id_profile']); ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>NIK</label>
                    <input name="nik" value="<?= $profil['nik'] ?>" class="form-control" placeholder="Masukkan NIK" required readonly>
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" value="<?= $profil['nama'] ?>" class="form-control" placeholder="Masukkan Nama Lengkap" required readonly>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" value="<?= $profil['alamat'] ?>" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" required readonly></textarea>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" value="<?= $profil['tgl_lahir'] ?>" class="form-control datetimepicker-input" id="datepicker1" required readonly/>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input name="jabatan" value="<?= $profil['jabatan'] ?>" class="form-control" placeholder="Masukkan Jabatan" required readonly>
               </div>

                <!-- to do only can input number -->
                <div class="form-group">
                    <label>Kuota Cuti</label>
                    <input name="kuota_cuti" value="<?= $profil['kuota_cuti'] ?>" pattern="{0-9}" class="form-control" placeholder="Masukkan Kuota Cuti" required readonly>
                </div>

                <div class="form-group">
                    <label>Histori Perjalanan</label>
                    <textarea name="history_perjalanan" value="<?= $profil['history_perjalanan'] ?>" class="form-control" rows="3" placeholder="Masukkan Histori Perjalanan" required readonly></textarea>
                </div>
               
            </div>
        </form>
        <?php }?>
    </div>
    <!-- /.card -->
