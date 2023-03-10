<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i> Form Update Jadwal Pelajaran
    </div>
<form method="post" action="<?php echo base_url('administrator/jadwal/update_aksi') ?>">
    <div class="form-group">
        <label>Hari</label>
        <input type="text" name="hari" class="form-control">
    </div>

    <div class="form-group">
        <label>Tahun Akademik / Semester</label>
        <input type="hidden" name="id_thn_akad" class="form-control" value="<?php echo $id_thn_akad; ?>">
        <input type="hidden" name="id_jadwal" class="form-control" value="<?php echo $id_jadwal; ?>">
        <input type="text" name="thn_akad_smt" class="form-control" value="<?php echo $thn_akad_smt. '/' .$semester; ?>" readonly/>
    </div>

    <div class="form-group">
        <label>Kelas</label>
        <input type="text" name="kelas" class="form-control" value="<?php echo $kelas; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Mata Pelajaran</label>
        <?php 
            $query = $this->db->query('SELECT kode_mapel,nama_mapel FROM mapel');
            
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown) {
                $dropDownList[$dropdown->kode_mapel] = $dropdown->nama_mapel;
            }

            echo form_dropdown('kode_mapel', $dropDownList, $kode_mapel, 'class="form-control" id="kode_mapel"');
        ?>
    </div>

    <div class="form-group">
        <label>Jam</label>
        <input type="time" name="jam1"> - <input type="time" name="jam2">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <?php echo anchor('administrator/jadwal/jadwal_aksi','<div class="btn btn-warning"> Kembali </div>') ?>

</form>

</div>