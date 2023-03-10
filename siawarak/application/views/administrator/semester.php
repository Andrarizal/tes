<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Semester
    </div>
    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('administrator/semester/tambah_semester','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sk"></i> 
        Tambah Semester</button>') ?>
    

    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>NO</th>
            <th>KODE SEMESTER</th>
            <th>NAMA SEMESTER</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($semester as $smt) : ?>
         <tr>
            <td width="20px"><?php echo $no++ ?></td>
            <td><?php echo $smt->kode_semester ?></td>
            <td><?php echo $smt->nama_semester ?></td>
            <td width="20px"><?php echo anchor('administrator/semester/update/'.$smt->kode_semester,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
            <td width="20px">   
                <a href="<?php echo base_url('administrator/semester/delete/'.$smt->kode_semester) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Semester ini?')"><i class="fa fa-trash"></i></a>
            </td> 
        </tr>
        <?php endforeach; ?>
        

  
    </table>
</div>