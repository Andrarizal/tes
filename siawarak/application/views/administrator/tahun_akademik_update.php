<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-edit"></i> Form Update Tahun Akademik
        </div>

        <?php foreach ($tahun_akademik as $ta) : ?>
            <form method="post" action="<?php echo base_url('administrator/tahun_akademik/update_aksi') ?>">
                <div class="form-group">
                    <label>Tahun Akademik</label>
                    <input type="hidden" name="id_thn_akad" class="form-control" value="<?php echo $ta->id_thn_akad ?>">
                    <input type="text" name="tahun_akademik" class="form-control" value="<?php echo $ta->tahun_akademik ?>">
                    <?php echo form_error('tahun_akademik', '<div class="text-danger small" ml-3>') ?>
                </div>

                <div class="form-group">
                    <label>Kode Tahun Akademik</label>
                    <input type="text" name="kode_tahunakademik" class="form-control" value="<?php echo $ta->kode_tahunakademik ?>">
                    <?php echo form_error('kode_tahunakademik', '<div class="text-danger small" ml-3>') ?>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option><?php echo $ta->status ?></option>
                        <option>Aktif</option>
                        <option>Tidak Aktif</option>
                    </select>
                    <?php echo form_error('status', '<div class="text-danger small" ml-3>') ?>
                </div>
                <a href="<?php echo base_url('administrator/tahun_akademik') ?>" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

        <?php endforeach; ?>
    </div>