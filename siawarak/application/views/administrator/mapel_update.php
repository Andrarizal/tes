<div class="container-fluid">
<div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Edit Mata Pelajaran 
    </div>

    <?php foreach($mapel as $mp) : ?>
        <form method="post" action="<?php echo base_url('administrator/mapel/update_aksi'); ?>">
            <div class="form-group">
                <label>Nama Mata Pelajaran</label>
                <input type="hidden" name="kode_mapel" class="form-control" value="<?php echo $mp->kode_mapel ?>">
                <input type="text" name="nama_mapel" class="form-control" value="<?php echo $mp->nama_mapel ?>">
            </div>
           
            <a href="<?php echo base_url('administrator/mapel') ?>" class="btn btn-sm btn-warning">Kembali</a>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
        <?php endforeach; ?>
</div>