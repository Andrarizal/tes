<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Search
    </div>
    <?php echo $this->session->flashdata('pesan') ?>

    <!-- <?php echo anchor('administrator/semester/tambah_semester','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sk"></i> 
        Tambah Semester</button>') ?> -->
    

    <table class="table table-striped table-hover table-bordered">
        <tr>
                <th>No</th>
                <th>Nama Tabel</th>
                <th>Hasil</th>
        </tr>

        <!-- semester -->
        <?php 
        $no = 1;
        foreach ($semester as $smt) : ?>
         <tr>
            <td width="20px"><?php echo $no++ ?></td>
            <td><?php echo $smt->kode_semester ?></td>
            <td><?php echo $smt->nama_semester ?></td>
         </tr>
        <?php endforeach; ?>

        <!-- siswa -->
        <?php 
        $no=1;
        foreach($siswa as $swa) : ?>
            <tr>
                <td><?php echo $no++ ?></td> 
                <td><?php echo $swa->nama_lengkap ?></td>
                <td><?php echo $swa->alamat ?></td> 
                <td><?php echo $swa->tempat_lahir?></td>
            </tr>
        <?php endforeach; ?>

      <!-- kelas -->
      <?php 
        $no = 1;
        foreach ($kelas as $kls) : ?>
         <tr>
            <td width="20px"><?php echo $no++ ?></td>
            <td><?php echo $kls->kode_kelas ?></td>
            <td><?php echo $kls->nama_kelas ?></td>
            <td><?php echo $kls->nama_wali ?></td>
         </tr>
        <?php endforeach; ?>

        <!-- guru -->
        <?php
        $no=1;
        foreach($guru as $gru) : ?>
            <tr>
                <td><?php echo $no++ ?></td> 
                <td><?php echo $gru->nip ?></td>
                <td><?php echo $gru->nama_guru ?></td> 
            </tr>
        <?php endforeach; ?>
        
        <!-- mapel -->
        <?php
        $no=1;
        foreach($mapel as $mpl) : ?>
            <tr>
                <td><?php echo $no++ ?></td> 
                <td><?php echo $mpl->kode_mapel ?></td>
                <td><?php echo $mpl->nama_mapel ?></td> 
            </tr>
        <?php endforeach; ?>

        <!-- jadwal -->
        <?php 
        $no = 1;
        foreach($jadwal as $jdw) : ?>
            <tr>
                <td width="20px"><?php echo $no++;  ?></td>
                <td><?php echo $jdw->nama_hari; ?></td>
                <td><?php echo $jdw->kode_mapel; ?></td>
                <td><?php echo $jdw>nama_mapel; ?></td>
                <td><?php echo $jdw->jam_keluar; ?>-<?php echo $jdw->jam_masuk; ?></td>
            </tr>
        <?php endforeach; ?>

        <!-- absensi -->

        <!-- user -->
        <?php 
        $no = 1;
        foreach($user as $users) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $users->username ?></td>
                <td><?php echo $users->email ?></td>
                <td><?php echo $users->level ?></td>
            </tr>
        <?php endforeach; ?>

        <!--  -->

    </table>
</div>