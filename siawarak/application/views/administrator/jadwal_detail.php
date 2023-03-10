<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Jadwal Pelajaran Kelas
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <div class="row mb-4">
        <div class="col">
            <a href="<?= base_url('administrator/jadwal'); ?>" class="btn btn-warning btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-reply"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
            <a class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#myModal">
                <span class="icon text-white-50">
                    <i class="fas fa-server"></i>
                </span>
                <span class="text">Tambah Jadwal</span>
            </a>

            <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteAll">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Hapus Semua Jadwal</span>
            </button>
        </div>
    </div>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>KELAS</th>
            <th>HARI</th>
            <th>NAMA MATA PELAJARAN</th>
            <th>SEMESTER</th>
            <th>JAM</th>
            <th>AKSI</th>
        </tr>
        <?php
        $no = 1;
        foreach ($jadwal as $jadwal) : ?>
            <tr>
                <td width="20px"><?php echo $no++;  ?></td>
                <td><?php echo $jadwal->kelas; ?></td>
                <td><?php echo $jadwal->hari; ?></td>
                <td><?php echo $jadwal->mapel; ?></td>
                <td><?php echo $jadwal->semester; ?></td>
                <td><?php echo $jadwal->waktu_awal; ?> - <?php echo $jadwal->waktu_akhir; ?></td>

                <!-- <td width="20px"><?php echo anchor('administrator/jadwal/editjadwal/' . $jadwal->kode_kls . '/' . $jadwal->kode_mp, '<div class="btn btn-sm btn-info"><i class="fa fa-edit"></i></div>') ?></td> -->
                <td width="20px"><?php echo anchor('administrator/jadwal/editjadwal/' . $jadwal->kode_jadwal, '<div class="btn btn-sm btn-info"><i class="fa fa-edit"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>


    </table>

    <!-- pembuka modal tambah jadwal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div id="dropzone1" class="pro-ad addcoursepro">
                                    <form method="post" action="<?php echo base_url('administrator/jadwal/savejadwal') ?>">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <input type="hidden" name="kode_kls" value="<?= $kode_kls ?>" hidden>
                                                        <input disabled type="text" class="form-control" value="<?= $kode_kls ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Hari</label>
                                                        <select class="form-control" name="hari" required>
                                                            <option value="">--Pilih Hari--</option>
                                                            <option>Senin</option>
                                                            <option>Selasa</option>
                                                            <option>Rabu</option>
                                                            <option>Kamis</option>
                                                            <option>Jumat</option>
                                                        </select>
                                                        <?php echo form_error('hari', '<div class="text-danger small ml-3">', '</div>') ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kode Mata Pelajaran</label>
                                                        <select class="form-control" name="kode_mp" id="" required>
                                                            <option value="">--Pilih Mata Pelajaran--</option>
                                                            <?php foreach ($mapel as $m) { ?>
                                                                <option value="<?= $m->kode_mapel ?>"><?= $m->kode_mapel ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <?php echo form_error('kode_mapel', '<div class="text-danger small ml-3">', '</div>') ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Semester</label>
                                                        <select class="form-control" name="kode_smt" id="" required>
                                                            <option value="">--Pilih Semester--</option>
                                                            <?php foreach ($semester as $s) { ?>
                                                                <option value="<?= $s->kode_semester ?>"><?= $s->nama_semester ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <?php echo form_error('semester', '<div class="text-danger small ml-3">', '</div>') ?>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                            <select class="form-control" name="kode_ta" id="" required>
                                                                <?php foreach ($tahun_akademik as $ta) { ?>
                                                                    <option value=""><?= $ta->kode_tahunakademik ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div> -->
                                                    <div class="form-group">
                                                        <label>Jam</label>
                                                        <input type="time" name="waktu_awal" required> - <input type="time" name="waktu_akhir" required>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                           <input name="waktu awal" type="time"  /> - <input name="waktu akhir" type="time" />

                                                        </div> -->
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MOdal penutup tambah jadwal -->

<!-- Modal -->
<div class="modal fade" id="deleteAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Hati-hati ketika melakukan hal ini!
                <br>
                Anda yakin untuk menghapus <b class="text-danger">Semua data Jadwal</b>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href='<?= base_url('administrator/jadwal/delete/' . $kode_kls); ?>'>Hapus Semua</a>
            </div>
        </div>
    </div>
</div>