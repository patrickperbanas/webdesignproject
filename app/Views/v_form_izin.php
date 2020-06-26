<div class="card card-primary">
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
    <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
            <?php
          if($type == 1) { ?>
            <h3 class="card-title float-right">Sisa Cuti: <?= $kuota_cuti?> </h3>
            <?php } ?>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url('izin/simpan?type='.$type) ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control datetimepicker-input" min="" value="<?= $izin['start_date'] == null ? '':$izin['start_date']?>" id="sdate"/>
                </div>

                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" name="end_date" class="form-control datetimepicker-input" id="edate" value="<?= $izin['end_date'] == null ? '':$izin['end_date']?>" readonly/>
                </div>
                <?php
                    if($type == 2) { ?>
                        <div class="form-group">
                            <label>Estimasi Biaya</label>
                            <input name="est_biaya" type="number" class="form-control" placeholder="Masukkan Estimasi Biaya" value="<?= $izin['estimasi_biaya'] == null ? '':$izin['estimasi_biaya']?>">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan Keterangan"><?= $izin['history_perjalanan'] == null ? '':$izin['history_perjalanan']?></textarea>
                        </div>
                    <?php }?>    

                <!-- hidden value for helper -->
                <input type="text" id="terpakai" name="length" class="collapse">
                <input type="text" id="type" class="collapse" value="<?= $type?>">
                <input type="text" name="id"  id="id_izin" class="collapse" value="<?= $izin['id_izin'] == null ? 0:$izin['id_izin']?>">
               
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
    <input type="text" id="kuota_cuti" class="collapse" value="<?= $kuota_cuti?>">
    <script>
        kuota_cuti = document.getElementById('kuota_cuti').value
        type = document.getElementById('type').value
        
        startDate = document.getElementById('sdate')
        endDate = document.getElementById('edate')
        today = new Date();
        tomorrow = new Date(today)
        tomorrow.setDate(tomorrow.getDate() + 1)
        startDate.min = tomorrow.toISOString().split("T")[0];
        start = ''

        if(startDate.value != null && startDate.value != '') {
            start = new Date(startDate.value)
            end = new Date(endDate.value)
            
            startMinTemp = end.getTime() - ((kuota_cuti-1) * 24 * 60 * 60 * 1000)
            
            if(startMinTemp > today.getTime()) {
                startDate.min = new Date(startMinTemp).toISOString().split("T")[0];
            }else{
                startDate.min = tomorrow.toISOString().split("T")[0];
            }
                
            startDate.max = end.toISOString().split("T")[0];
        }

        startDate.addEventListener('change', function(v){
            if(kuota_cuti != null && kuota_cuti != '' && type == 1){
                start = this.value
                endDateMin = new Date(start)
                endDateMin.setDate(endDateMin.getDate())
                
                endDateMax = new Date(start)
                endDateMax.setDate(endDateMax.getDate()+parseInt(kuota_cuti)-1)
                
                endDate.min = endDateMin.toISOString().split("T")[0];
                endDate.max = endDateMax.toISOString().split("T")[0];
                endDate.readOnly = false
                if(endDate.value != ''){
                    start = new Date(this.value)
                    end = new Date(endDate.value)
                    var Difference_In_Time = end.getTime() - start.getTime(); 
                    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
                    document.getElementById('terpakai').value = Difference_In_Days+1;
                }
            }
            else{
                start = this.value
                endDateMin = new Date(start)
                endDateMin.setDate(endDateMin.getDate())

                endDate.min = endDateMin.toISOString().split("T")[0];
                endDate.readOnly = false
            }
        });

        endDate.addEventListener('change', function(v){
            if(kuota_cuti != null && kuota_cuti != '' && type == 1){
                start = new Date(startDate.value)
                end = new Date(this.value)
                
                startMinTemp = end.getTime() - ((kuota_cuti-1) * 24 * 60 * 60 * 1000)
                
                if(startMinTemp > today.getTime()) {
                    startDate.min = new Date(startMinTemp).toISOString().split("T")[0];
                }else{
                    startDate.min = tomorrow.toISOString().split("T")[0];
                }
                    
                startDate.max = end.toISOString().split("T")[0];
                var Difference_In_Time = end.getTime() - start.getTime(); 
                var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
                document.getElementById('terpakai').value = Difference_In_Days+1
            }
        });
        
    </script>
