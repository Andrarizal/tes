<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Kelas
    </div>
    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('administrator/kelas/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sk"></i> 
        Tambah Kelas</button>') ?>
    

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>KODE KELAS</th>
            <th>NAMA KELAS</th>
            <th>NAMA WALI</th>
            <th colspan="6">AKSI</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($kelas as $kls) : ?>
         <tr>
            <td width="20px"><?php echo $no++ ?></td>
            <td><?php echo $kls->kode_kelas ?></td>
            <td><?php echo $kls->nama_kelas ?></td>
            <td><?php echo $kls->nama_wali ?></td>
            <td width="20px"><?php echo anchor('administrator/kelas/update/'.$kls->kode_kelas,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
            <td width="20px">   
                <a href="<?php echo base_url('administrator/kelas/delete/'.$kls->kode_kelas) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Kelas ini?')"><i class="fa fa-trash"></i></a>
            </td>
        
        </tr>
        <?php endforeach; ?>
        

  
    </table>
</div>