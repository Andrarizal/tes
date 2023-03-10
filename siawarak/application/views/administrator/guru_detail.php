<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i> Detail Guru
    </div>

    <table class="table table-hover table-bordered table-striped">
       <?php foreach($detail as $dt) : ?>
        <img class="mb-3" src="<?php echo base_url('assets/uploads/').$dt->photo?>" style="width: 20%">
        <tr>
            <th>NIP</th>
            <td><?php echo $dt->nip; ?></td>
        </tr>

        <tr>
            <th>NAMA GURU</th>
            <td><?php echo $dt->nama_guru; ?></td>
        </tr>

        <tr>
            <th>ALAMAT</th>
            <td><?php echo $dt->alamat; ?></td>
        </tr>
        <tr>
            <th>JENIS KELAMIN</th>
            <td><?php echo $dt->jenis_kelamin; ?></td>
        </tr>
        <tr>
            <th>EMAIL</th>
            <td><?php echo $dt->email; ?></td>
        </tr>

        <tr>
            <th>TELEPON</th>
            <td><?php echo $dt->telp; ?></td>
        </tr>
        <tr>
            <th>PENGAMPU</th>
            <td><?php echo $dt->pengampu; ?></td>
        </tr>

        <?php endforeach; ?>
    </table>
    
    <?php echo anchor('administrator/guru','<div class="btn btn-sm btn-primary">Kembali</div>')?><br><br><br>
</div>