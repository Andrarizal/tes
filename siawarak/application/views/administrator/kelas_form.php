<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i> Form Input Kelas
    </div>
    <form method="post" action="<?php echo base_url('administrator/kelas/input_aksi') ?>">
        <div class="form-group">
            <label>Kode Kelas</label>
            <input type="text" name="kode_kelas" placeholder="Masukan Kode Kelas" class="form-control">
            <?php echo form_error('kode_kelas','<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" placeholder="Masukan Nama Kelas" class="form-control">
            <?php echo form_error('nama_kelas','<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
        <label>Nama Wali</label>
            <select name="nama_wali" class="form-control">
                 <option value="">--Pilih Nama Wali--</option>
                    <?php foreach($guru as $gru) : ?>
                        <option value="<?php echo $gru->nama_guru?>">
                             <?php echo $gru->nama_guru ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <?php echo form_error('nama_wali','<div class="text-danger small ml-3">','</div>')?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url('administrator/kelas') ?>" class="btn btn-warning mb-3 mt-3">Kembali</a>
    </form>
</div>