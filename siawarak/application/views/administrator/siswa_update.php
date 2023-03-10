<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Update Siswa
    </div>

<?php foreach($siswa as $swa) : ?>
    <?php echo form_open_multipart('administrator/siswa/update_siswa_aksi') ?>
    <div class="form-group">
        <label>NIS Siswa</label>
        <input type="hidden" name="id" class="form-control" value="<?php echo $swa->id ?>">
        <input type="text" name="nis" class="form-control"  value="<?php echo $swa->nis ?>"readonly>
        <?php echo form_error('nis','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Nama Siswa</label>
        <input type="text" name="nama_lengkap" class="form-control"  value="<?php echo $swa->nama_lengkap ?>">
        <?php echo form_error('nama_lengkap','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control"  value="<?php echo $swa->alamat ?>">
        <?php echo form_error('alamat','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="<?php echo $swa->telepon ?>">
        <?php echo form_error('telepon','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control"  value="<?php echo $swa->tempat_lahir ?>">
        <?php echo form_error('tempat_lahir','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control"  value="<?php echo $swa->tanggal_lahir ?>">
        <?php echo form_error('tanggal_lahir','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control"  value="<?php echo $swa->jenis_kelamin ?>">
            <option>Laki-Laki</option>
            <option>Perempuan</option>
        </select>
        <?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Nama Kelas</label>
        <select name="nama_kelas" class="form-control"  value="<?php echo $swa->nama_kelas ?>">
            <?php foreach($kelas as $kls) : ?>
                <option value="<?php echo $kls->nama_kelas?>">
                    <?php echo $kls->nama_kelas ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error('nama_kelas','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <!-- <?php foreach($detail as $dt) : ?>
            <img src="<?php echo base_url(). 'assets/uploads/'.$swa->photo ?>">
            <?php endforeach; ?><br> <br> -->
        <label>Foto</label><br>
        <input type="file" name="userfile"  value="<?php echo $swa->photo ?>">
    </div>

    <a href="<?php echo base_url('administrator/siswa') ?>" class="btn btn-warning mb-5 mt-3">Kembali</a>
    <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>

    <?php form_close(); ?>

    <?php endforeach; ?>
</div>