<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Jadwal
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>KODE KELAS</th>
            <th>NAMA KELAS</th>
            <th>NAMA WALI</th>
            <th>AKSI</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($kelas as $kls) : ?>
         <tr>
            <td width="20px"><?php echo $no++ ?></td>
            <td><?php echo $kls->kode_kelas ?></td>
            <td><?php echo $kls->nama_kelas ?></td>
            <td><?php echo $kls->nama_wali ?></td>
            <td width="20px"><?php echo anchor('administrator/jadwal/list/'.$kls->kode_kelas,'<div class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></div>') ?></td>
         </tr>
        <?php endforeach; ?>
        

  
    </table>
</div>