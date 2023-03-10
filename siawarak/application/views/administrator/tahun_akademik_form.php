<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-plus"></i> Form Input Tahun Akademik
        </div>
        <form method="post" action="<?php echo base_url('administrator/tahun_akademik/tambah_tahun_akademik_aksi') ?>">
            <div class="form-group">
                <label>Tahun Akademik</label>
                <input type="text" name="tahun_akademik" placeholder="Masukan Tahun Akademik" class="form-control">
                <?php echo form_error('tahun_akademik', '<div class="text-danger small" ml-3>') ?>
            </div>

            <div class="form-group">
                <label>Kode Tahun Akademik</label>
                <input type="text" name="kode_tahunakademik" placeholder="Masukan Kode Tahun Akademik" class="form-control">
                <?php echo form_error('kode_tahunakademik', '<div class="text-danger small" ml-3>') ?>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="">--Pilihan Status--</option>
                    <option>Aktif</option>
                    <option>Tidak Aktif</option>
                </select>
                <?php echo form_error('status', '<div class="text-danger small" ml-3>') ?>
            </div>
            <a href="<?php echo base_url('administrator/tahun_akademik') ?>" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>