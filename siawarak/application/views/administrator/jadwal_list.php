<div class="container-fluid">
        <div class="alert alert-success" role="alert">
             <i class="fas fa-university"></i> Jadwal Pelajaran Kelas
        </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <center class="mb-4">
        <legend class="mt-3"><strong>Jadwal Pelajaran Kelas</strong></legend>

        <table>
            <tr>
                <td><strong>Kelas</strong></td>
                <td>&nbsp; : <?php echo $kelas ?></td>
            </tr>
            <tr>
                <td><strong>Tahun Akademik (Semester)</strong></td>
                <td>&nbsp; : <?php echo $tahun_akademik.'&nbsp;('.$semester.')' ?></td>
            </tr>
        </table>

    </center>
    <a href="<?php echo base_url('administrator/jadwal') ?>" class="btn btn-sm btn-warning mb-3">Kembali</a>
    <?php echo anchor('administrator/jadwal/tambah_jadwal/'.$kelas.'/'.$id_thn_akad ,'<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sk"></i> 
        Tambah Jadwal Pelajaran </button>') ?>
    <?php echo anchor('administrator/jadwal/print','<button class="btn btn-sm btn-info mb-3"><i class="fas fa-plus fa-sk"></i> 
        Print</button>') ?>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>HARI</th>
            <th>KODE MATA PELAJARAN</th>
            <th>NAMA MATA PELAJARAN</th>
            <th>JAM</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php 
        $no = 1;
        foreach($jadwal_data as $jadwal) : ?>
            <tr>
                <td width="20px"><?php echo $no++;  ?></td>
                <td><?php echo $jadwal->nama_hari; ?></td>
                <td><?php echo $jadwal->kode_mapel; ?></td>
                <td><?php echo $jadwal->nama_mapel; ?></td>
                <td><?php echo $jadwal->jam_keluar; ?>-<?php echo $jadwal->jam_masuk; ?></td>

                 <td width="20px"><?php echo anchor('administrator/jadwal/update/'.$jadwal->id_jadwal.'/'.$kelas ,' <div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                 <td width="20px"><?php echo anchor('administrator/jadwal/delete/'.$jadwal->id_jadwal,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
        

    </table>



</div>