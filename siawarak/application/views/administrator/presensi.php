<div class="container-fluid">
        <div class="alert alert-success" role="alert">
             <i class="fas fa-university"></i> Presensi Siswa
        </div>

    <table class="table table-bordered table-hover table-striped">
    <tr>
                                
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no=1;

                            foreach ($siswa as $value) { ?>
                            <tr>
                                
                                <td><?php echo $value->nis ?></td>
                                <td><?php echo $value->nama_lengkap ?></td>
                                <td><?php echo $value->nama_kelas ?></td>
                                
                                <td>
                                    <a href="<?php echo base_url('administrator/presensi/detailpresensi/'.$value->nis) ?>"><div class="btn btn-sm btn-info"><i class="fa fa-edit"></i></div></a>
                                </td>
                            </tr>
                            <?php
                            $no++; 
                        } ?>
                        </tbody>
        

    </table>
    <!-- <?= var_dump($siswa);  ?> -->

</div>

