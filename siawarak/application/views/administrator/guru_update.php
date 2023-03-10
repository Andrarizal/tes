<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Update Guru
    </div>

<?php foreach($guru as $gru) : ?>
    <?php echo form_open_multipart('administrator/guru/update_guru_aksi') ?>
    <div class="form-group">
        <label>NIP</label>
        <input type="hidden" name="id_guru" class="form-control" value="<?php echo $gru->id_guru ?>">
        <input type="text" name="nip" class="form-control"  value="<?php echo $gru->nip ?>" readonly>
        <?php echo form_error('nip','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Nama Guru</label>
        <input type="text" name="nama_guru" class="form-control"  value="<?php echo $gru->nama_guru ?>">
        <?php echo form_error('nama_guru','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control"  value="<?php echo $gru->alamat ?>">
        <?php echo form_error('alamat','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telp" class="form-control" value="<?php echo $gru->telp ?>">
        <?php echo form_error('telp','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control"  value="<?php echo $gru->email ?>">
        <?php echo form_error('email','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control"  value="<?php echo $gru->jenis_kelamin ?>">
            <option>Laki-Laki</option>
            <option>Perempuan</option>
        </select>
        <?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>')?>
    </div>
    <div class="form-group">
        <label>Pengampu</label>
        <select name="pengampu" class="form-control"  value="<?php echo $gru->pengampu ?>">
            <option>Kepala Sekolah</option>
            <option>Guru Mata Pelajaran Agama Islam</option>
            <option>Guru Mata Pelajaran Olahraga</option>
            <option>Operator Sekolah</option>
            <option>Kelas 1</option>
            <option>Kelas 2</option>
            <option>Kelas 3</option>
            <option>Kelas 4</option>
            <option>Kelas 5</option>
            <option>Kelas 6</option>
            <!-- <?php foreach($kelas as $kls) : ?>
                <option value="<?php echo $kls->nama_kelas?>">
                    <?php echo $kls->nama_kelas ?>
                </option>
            <?php endforeach; ?> -->
        </select>
        <?php echo form_error('nama_kelas','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <!-- <?php foreach($detail as $dt) : ?>
            <img src="<?php echo base_url(). 'assets/uploads/'.$gru->photo ?>">
            <?php endforeach; ?><br> <br> -->
        <label>Foto</label><br>
        <input type="file" name="userfile"  value="<?php echo $gru->photo ?>">
    </div>

    <a href="<?php echo base_url('administrator/guru') ?>" class="btn btn-warning mb-5 mt-3">Kembali</a>
    <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>

    <?php form_close(); ?>

    <?php endforeach; ?>
</div>