<div class="container-fluid">
<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Mata Pelajaran
    </div>
    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('administrator/mapel/tambah_mapel','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sk"></i> 
        Tambah Mata Pelajaran </button>') ?>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>KODE MATA PELAJARAN</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($mapel as $mp) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $mp->kode_mapel?></td>
            <td width="20px"><?php echo anchor('administrator/mapel/detail/'.$mp->kode_mapel,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
            <td width="20px"><?php echo anchor('administrator/mapel/update/'.$mp->kode_mapel,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
            <td width="20px">   
                <a href="<?php echo base_url('administrator/mapel/delete/'.$mp->kode_mapel) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Mata Pelajaran ini?')"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>