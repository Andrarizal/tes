<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i> Form Update Jadwal Pelajaran
    </div>
    <form method="post" action="<?php echo base_url('administrator/jadwal/update_aksi') ?>">

                                        
                                            <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label>Kode Kelas</label>
                                                            
                                                        <!-- <input type="hidden" name="id_thn_akad" class="form-control" value="<?php echo $id_thn_akad; ?>"> -->
                                                            <input type="hidden" name="kode_jadwal" value="<?php echo $jadwal['kode_jadwal']?>">
                                                            <!-- <?php var_dump($jadwal['kode_jadwal']) ?> -->
                                                            <input name="kode_kls" type="text" class="form-control" placeholder="Kode Kelas" value="<?php echo $jadwal['kode_kls'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mata Pelajaran</label>
                                                            <input name="kode_mp" type="text" class="form-control" placeholder="Kode MataPelajaran" value="<?php echo $jadwal['kode_mp'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Semester</label>
                                                            <input name="kode_smt" type="text" class="form-control" placeholder="Kode Semester" value="<?php echo $jadwal['kode_smt'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Hari</label>
                                                            <input name="hari" type="text" class="form-control" placeholder="Hari" value="<?php echo $jadwal['hari'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jam</label>
                                                            <input type="time" name="waktu_awal" value="<?php echo $jadwal['waktu_awal'] ?>" required> - <input type="time" name="waktu_akhir" value="<?php echo $jadwal['waktu_akhir'] ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <?php echo anchor('administrator/jadwal/list/'.$jadwal['kode_kls'] ,'<div class="btn btn-warning"> Kembali </div>') ?>
                                                    </div>
                                                </div>
                                            </form>

    

</form>

</div>