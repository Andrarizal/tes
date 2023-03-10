<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Presensi Kelas
    </div>


    <table class="table table-bordered table-hover table-striped">
        <div class="col">
            <a href="<?= base_url('user/presensi/presensi'); ?>" class="btn btn-warning btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-reply"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
            <a class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#myModal">
                <span class="icon text-white-50">
                    <i class="fas fa-server"></i>
                </span>
                <span class="text">Tambah Presensi</span>
            </a>
            <a href="<?= base_url('user/presensi/download_csv_data'); ?>" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
                <span class="text">Download Data</span>
            </a>

            <!-- <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteAll">
				<span class="icon text-white-50">
					<i class="fas fa-trash"></i>
				</span>
				<span class="text">Hapus Semua Jadwal</span>
			</button> -->
        </div>
        <br>
        <tr>
            <th>No</th>
            <th>Matapelajaran</th>
            <th>Tahun Akademik</th>
            <th>Tanggal</th>
            <th>Pertemuan</th>
            <th>Hadir</th>
            <th>Alpha</th>
            <th>Ijin</th>
            <th>Sakit</th>
            <th colspan="2">Aksi</th>
        </tr>
        </thead>
        <tbody>
            <?php
            // Membuat variabel untuk menampung total nilai
            $total_alpha = 0;
            $total_ijin = 0;
            $total_sakit = 0;
            $total_hadir = 0;
            $total_pertemuan = 0;

            $no = 1;

            foreach ($presensi as $value) {
                // Menambahkan nilai dari setiap kolom ke variabel total
                $total_alpha += $value->alpha;
                $total_ijin += $value->ijin;
                $total_sakit += $value->sakit;
                $total_hadir += $value->hadir;
                $total_pertemuan += $value->pertemuan;
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $value->nama_mapel ?></td>
                    <td>
                        <?php
                        echo $this->db->query('SELECT tahun_akademik FROM `tahun_akademik` WHERE `kode_tahunakademik` = "' . $value->kode_tahunakademik . '"')->result()[0]->tahun_akademik;
                        ?>
                    </td>
                    <td><?php echo $value->tanggal ?></td>
                    <td><?php echo $value->pertemuan ?></td>
                    <td><?php echo $value->hadir ?></td>
                    <td><?php echo $value->alpha ?></td>
                    <td><?php echo $value->ijin ?></td>
                    <td><?php echo $value->sakit ?></td>
                    <td>
                        <a href="<?php echo base_url('user/presensi/update/' . $value->id_presensi) ?>">
                            <div class="btn btn-sm btn-info"><i class="fa fa-edit"></i></div>
                        </a>
                    </td>
                    <td>   
                        <a href="<?php echo base_url('user/presensi/hapuspresensi/' . $value->id_presensi) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus presensi ini?')"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php var_dump($value->id_presensi);?>
            <?php
                $no++;
            }
            ?>
            <tr>
                <td colspan="4">Total</td>
                <td><?php echo $total_pertemuan ?></td>
                <td><?php echo $total_hadir ?></td>
                <td><?php echo $total_alpha ?></td>
                <td><?php echo $total_ijin ?></td>
                <td><?php echo $total_sakit ?></td>
                <td colspan="3"></td>
            </tr>
            <!-- <?php var_dump($nis) ?> -->
        </tbody>



    </table>

    <!-- modal tambah presensi -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div id="dropzone1" class="pro-ad addcoursepro">
                                    <?php echo form_open_multipart("user/presensi/savepresensi/.$nis"); ?>
                                    <?php echo validation_errors(); ?>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>NIS</label>
                                                    <input type="hidden" name="nis" value="<?= $nis ?>" hidden>
                                                    <input disabled type="text" class="form-control" value="<?= $nis ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Mata Pelajaran</label>
                                                    <select class="form-control" name="kode_mp" id="" required>
                                                        <option value="">--Pilih Mata Pelajaran--</option>
                                                        <?php foreach ($mapel as $m) { ?>
                                                            <option value="<?= $m->kode_mapel ?>" required><?= $m->nama_mapel ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Semester</label>
                                                    <select class="form-control" name="kode_semester" id="" required>
                                                        <option value="">--Pilih Semester--</option>
                                                        <?php foreach ($semester as $s) { ?>
                                                            <option value="<?= $s->kode_semester ?>"><?= $s->nama_semester ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tahun Ajaran</label>
                                                    <select class="form-control" name="kode_ta" id="" required>
                                                        <option value="">--Pilih Tahun Ajaran--</option>
                                                        <?php foreach ($tahun_akademik as $ta) { ?>
                                                            <option value="<?= $ta->kode_tahunakademik ?>"><?= $ta->tahun_akademik ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pertemuan</label>
                                                    <input name="pertemuan" type="text" class="form-control" placeholder="Pertemuan" value="" required />
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input name="tanggal" type="date" class="form-control" placeholder="Tanggal" value="" required />
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Hadir</label>
                                                    <input name="hadir" type="text" class="form-control" placeholder="Hadir" value="" required />
                                                </div>

                                                <div class="form-group">
                                                    <label>Ijin</label>
                                                    <input name="ijin" type="text" class="form-control" placeholder="Izin" value="" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Sakit</label>
                                                    <input name="sakit" type="text" class="form-control" placeholder="sakit" value="" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Alpha</label>
                                                    <input name="alpha" type="text" class="form-control" placeholder="alpha" value="" required />
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                            </div>
                                        </div>
                                        <div class="row">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal tambah presensi -->
    </form>
    </div>



