<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Update Semester
    </div>

    <?php foreach($semester as $sem) : ?>
    <form method="post" action="<?php echo base_url('administrator/semester/update_aksi') ?>">
        <div class="form-group">
            <label>Nama Semester</label>
            <input type="hidden" name="kode_semester" class="form-control" value="<?php echo $sem->kode_semester ?>">
            <input type="text" name="nama_semester" class="form-control" value="<?php echo $sem->nama_semester?>">
            <?php echo form_error('nama_semester','<div class="text-danger small" ml-3>') ?>
        </div>

        <a href="<?php echo base_url('administrator/semester') ?>" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <?php endforeach; ?>

</div>