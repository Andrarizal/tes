<div class="container-fluid">
    <div class="container fluid">
            <div class="container-fluid">
            <div class="alert alert-success" role="alert">
            <i class="fas fa-eye"></i> Detail Mata Pelajaran
    </div>

    <table class="table table-hover table-striped table-bordered">
       <?php foreach ($detail as $dt) : ?>

        <tr>
            <th>Kode Mata Pelajaran</th>
            <td><?php echo $dt->kode_mapel; ?></td>
        </tr>

        <tr>
            <th>Nama Mata Pelajaran</th>
            <td><?php echo $dt->nama_mapel; ?></td>
        </tr>

        <?php endforeach; ?>
    </table>

   <?php echo anchor('administrator/mapel','<div class="btn btn-sm btn-primary">Kembali</div>')  ?> 
</div>