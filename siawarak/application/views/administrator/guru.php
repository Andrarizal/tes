<div class="container-fluid">

    <div class="container fluid">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-university"></i> Guru
            </div>
            <?php echo $this->session->flashdata('pesan') ?>

            <?php echo anchor('administrator/guru/tambah_guru', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sk"></i> 
        Tambah Guru </button>') ?>

            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA GURU</th>
                    <th colspan="3">AKSI</th>
                </tr>

                <?php

                $no = 1;
                foreach ($guru as $gru) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $gru->nip ?></td>
                        <td><?php echo $gru->nama_guru ?></td>

                        <td width="20px"><?php echo anchor('administrator/guru/detail/' . $gru->nip, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
                        <td width="20px"><?php echo anchor('administrator/guru/update/' . $gru->nip, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                        <td width="20px">
                            <a href="<?php echo base_url('administrator/guru/delete/' . $gru->nip) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Data Guru ini?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>