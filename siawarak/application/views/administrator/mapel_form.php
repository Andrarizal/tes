<div class="container-fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i> Form Input Mata Pelajaran
    </div>
    <form method="post" action="<?php echo base_url('administrator/mapel/tambah_mapel_aksi')  ?>">
    <div class="form-group">
        <label>Kode Mata Pelajaran</label>
        <input type="text" name="kode_mapel" class="form-control">
        <?php echo form_error('kode_mapel','<div class="text-danger small ml-3 ">') ?>
    </div>

    <div class="form-group">
        <label>Nama Mata Pelajaran</label>
        <input type="text" name="nama_mapel" class="form-control">
        <?php echo form_error('nama_mapel','<div class="text-danger small ml-3 ">') ?>
    </div>

    <a href="<?php echo base_url('administrator/mapel') ?>" class="btn btn-warning mb-5">Kembali</a>
    <button type="submit" class="btn btn-primary mb-5">Simpan</button>

</form>
</div>