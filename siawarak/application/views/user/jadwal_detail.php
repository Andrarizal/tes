<div class="container-fluid">
        <div class="alert alert-success" role="alert">
             <i class="fas fa-university"></i> Jadwal Pelajaran Kelas
        </div>


    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>KELAS</th>
            <th>HARI</th>
            <th>NAMA MATA PELAJARAN</th>
            <th>SEMESTER</th>
            <th>JAM</th>
           
        </tr>
        <?php 
        $no = 1;
        foreach($jadwal as $jadwal) : ?>
            <tr>
                <td width="20px"><?php echo $no++;  ?></td>
                <td><?php echo $jadwal->kelas; ?></td>
                <td><?php echo $jadwal->hari; ?></td>
                <td><?php echo $jadwal->mapel; ?></td>
                <td><?php echo $jadwal->semester; ?></td>
                <td><?php echo $jadwal->waktu_awal; ?> - <?php echo $jadwal->waktu_akhir; ?></td>

            </tr>
        <?php endforeach; ?>
        

    </table>
