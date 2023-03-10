<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i> Detail Siswa
    </div>

    <table class="table table-hover table-bordered table-striped">
       <?php foreach($detail as $dt) : ?>
        <img class="mb-3" src="<?php echo base_url('assets/uploads/').$dt->photo?>" style="width: 20%">
        <tr>
            <th>NIS</th>
            <td><?php echo $dt->nis; ?></td>
        </tr>

        <tr>
            <th>NAMA LENGKAP</th>
            <td><?php echo $dt->nama_lengkap; ?></td>
        </tr>

        <tr>
            <th>ALAMAT</th>
            <td><?php echo $dt->alamat; ?></td>
        </tr>

        <!-- <tr>
            <th>EMAIL</th>
            <td><?php echo $dt->email; ?></td>
        </tr> -->

        <tr>
            <th>TELEPON</th>
            <td><?php echo $dt->telepon; ?></td>
        </tr>
        <tr>
            <th>TEMPAT LAHIR</th>
            <td><?php echo $dt->tempat_lahir; ?></td>
        </tr>
        <tr>
            <th>TANGGAL LAHIR</th>
            <td><?php echo $dt->tanggal_lahir; ?></td>
        </tr>
        <tr>
            <th>JENIS KELAMIN</th>
            <td><?php echo $dt->jenis_kelamin; ?></td>
        </tr>
        <tr>
            <th>NAMA KELAS</th>
            <td><?php echo $dt->nama_kelas; ?></td>
        </tr>

        <?php endforeach; ?>
    </table>
    
    <?php echo anchor('administrator/siswa','<div class="btn btn-sm btn-primary">Kembali</div>')?><br><br><br>
</div>