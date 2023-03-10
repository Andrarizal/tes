<div class="container-fluid">

<div class="container fluid">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Siswa
    </div>
    
    <div class="row mb-4">
		<div class="col">
			<a href="<?= base_url('administrator/siswa/tambah_siswa'); ?>" class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-user-plus"></i>
				</span>
				<span class="text">Tambah siswa</span>
			</a>
			<button class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#formUpload">
				<span class="icon text-white-50">
					<i class="fas fa-upload"></i>
				</span>
				<span class="text">Upload siswa</span>
			</button>

			<button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteAll">
				<span class="icon text-white-50">
					<i class="fas fa-trash"></i>
				</span>
				<span class="text">Hapus semua siswa</span>
			</button>
			<a href="<?= base_url('administrator/siswa/download_csv_data'); ?>" class="btn btn-info btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-download"></i>
				</span>
				<span class="text">Download Data</span>
			</a>
			<a href="<?= base_url('administrator/siswa/downloadAllImage'); ?>" class="btn btn-primary btn-icon-split">
				<span class="icon text-white-50">
					<i class="fa fa-file-image"></i>
				</span>
				<span class="text">Download Gambar</span>
			</a>
		</div>
	</div>
    

    <?php echo $this->session->flashdata('pesan') ?>


    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>NO</th>
            <th>NAMA LENGKAP</th>
            <th>ALAMAT</th>
            <th>TEMPAT LAHIR</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php

        $no=1;
        foreach($siswa as $swa) : ?>
            <tr>
                <td><?php echo $no++ ?></td> 
                <td><?php echo $swa->nama_lengkap ?></td>
                <td><?php echo $swa->alamat ?></td> 
                <td><?php echo $swa->tempat_lahir?></td>

                 <td width="20px"><?php echo anchor('administrator/siswa/detail/'.$swa->id,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
                 <td width="20px"><?php echo anchor('administrator/siswa/update/'.$swa->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				 <td width="20px">   
                	<a href="<?php echo base_url('administrator/siswa/delete/'.$swa->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Siswa ini?')"><i class="fa fa-trash"></i></a>
          		 </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="formUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Data Siswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="siswa/insert_csv_data" enctype="multipart/form-data">
				<div class="modal-body">
					<label for="csv_file">Upload File CSV:</label>
					<input type="file" name="csv_file" id="csv_file">
					<br><br>
					<!-- Divider -->
					<hr class="sidebar-divider d-none d-md-block">
					Download template data siswa disini.
					<a href="<?= base_url('administrator/siswa/download_template_siswa'); ?>" class='btn btn-info btn-sm'>Template
						Siswa</a>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hapus Siswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Hati-hati ketika melakukan hal ini!
				<br>
				Anda yakin untuk menghapus <b class="text-danger">Semua data siswa</b>?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a class="btn btn-danger" href='<?= base_url('administrator/siswa/delete_all_siswa'); ?>'>Hapus Semua</a>
			</div>
		</div>
	</div>
</div>