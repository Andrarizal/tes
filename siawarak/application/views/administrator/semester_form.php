<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i> Form Input Semester
    </div>
    <form method="post" action="<?php echo base_url('administrator/semester/tambah_semester_aksi') ?>">
        <div class="form-group">
            <label>Semester</label>
            <input type="text" name="nama_semester" placeholder="Masukan Nama Semester" class="form-control">
            <?php echo form_error('nama_semester','<div class="text-danger small" ml-3>') ?>
        </div>

        <div class="form-group">
            <label>Kode Semester</label>
            <input type="text" name="kode_semester" placeholder="Masukan Kode Semester" class="form-control">
            <?php echo form_error('kode_semester','<div class="text-danger small" ml-3>') ?>
        </div>

        <a href="<?php echo base_url('administrator/semester') ?>" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>