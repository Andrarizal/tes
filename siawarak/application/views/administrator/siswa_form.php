<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i> Form Input Siswa
    </div>


    <?php echo form_open_multipart('administrator/siswa/tambah_siswa_aksi') ?>
    <div class="form-group">
        <label>NIS Siswa</label>
        <input type="text" name="nis" class="form-control">
        <?php echo form_error('nis','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Nama Siswa</label>
        <input type="text" name="nama_lengkap" class="form-control">
        <?php echo form_error('nama_lengkap','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control">
        <?php echo form_error('alamat','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control">
        <?php echo form_error('telepon','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control">
        <?php echo form_error('tempat_lahir','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control">
        <?php echo form_error('tanggal_lahir','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="">--Pilih Jenis Kelamin--</option>
            <option>Laki-Laki</option>
            <option>Perempuan</option>
        </select>
        <?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Nama Kelas</label>
        <select name="nama_kelas" class="form-control">
            <option value="">--Pilih Nama Kelas--</option>
            <?php foreach($kelas as $kls) : ?>
                <option value="<?php echo $kls->nama_kelas?>">
                    <?php echo $kls->nama_kelas ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error('nama_kelas','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Foto</label><br>
        <input type="file" name="photo" required>
    </div>
    <a href="<?php echo base_url('administrator/siswa') ?>" class="btn btn-warning mb-5 mt-3">Kembali</a>
    <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>

    <?php form_close(); ?>
</div>