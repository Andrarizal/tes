<div class="container fluid">
<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Update Kelas
    </div>
    <?php foreach ($kelas as $kls) : ?>
        <form method="post" action="<?php echo base_url('administrator/kelas/update_aksi'); ?>">
        <div class="form-group">
             <label>Nama Kelas </label>
             <input type="hidden" name="kode_kelas" value="<?php echo $kls->kode_kelas ?>">
             <input type="text" name="nama_kelas" class="form-control" value="<?php echo $kls->nama_kelas ?>" readonly>
        </div>
        <div class="form-group">
        <label>Nama Wali</label> 
        <select name="nama_wali" class="form-control" > 
        <option><?php echo $kls->nama_wali ?></option>
                <?php foreach($guru as $gru) : ?>
                        <option value="<?php echo $gru->nama_guru?>">
                             <?php echo $gru->nama_guru ?>
                        </option>
                <?php endforeach; ?>
        </select>
            <?php echo form_error('nama_wali','<div class="text-danger small ml-3">','</div>')?>
        </div>
        
        <a href="<?php echo base_url('administrator/kelas') ?>" class="btn btn-warning mb-3 mt-3">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <?php endforeach; ?>
</div>