<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Presensi Kelas
    </div>


    <table class="table table-bordered table-hover table-striped">
    <div class="col">
			<a href="<?= base_url('administrator/presensi'); ?>" class="btn btn-warning btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-reply"></i>
				</span>
				<span class="text">Kembali</span>
			</a>
            <a href="<?= base_url('administrator/presensi/download_csv_data'); ?>" class="btn btn-primary btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-download"></i>
				</span>
				<span class="text">Download Data</span>
			</a>

			<!-- <button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteAll">
				<span class="icon text-white-50">
					<i class="fas fa-trash"></i>
				</span>
				<span class="text">Hapus Semua Jadwal</span>
			</button> -->
		</div>
        <br>
        <tr>
            <th>No</th>
            <th>Matapelajaran</th>
            <th>Tahun Akademik</th>
            <th>Tanggal</th>
            <th>Pertemuan</th>
            <th>Hadir</th>
            <th>Alpha</th>
            <th>Ijin</th>
            <th>Sakit</th>
        </tr>
        </thead>
        <tbody>
            <?php
            // Membuat variabel untuk menampung total nilai
            $total_alpha = 0;
            $total_ijin = 0;
            $total_sakit = 0;
            $total_hadir = 0;
            $total_pertemuan = 0;

            $no = 1;

            foreach ($presensi as $value) {
                // Menambahkan nilai dari setiap kolom ke variabel total
                $total_alpha += $value->alpha;
                $total_ijin += $value->ijin;
                $total_sakit += $value->sakit;
                $total_hadir += $value->hadir;
                $total_pertemuan += $value->pertemuan;
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $value->nama_mapel ?></td>
                    <td>
                        <?php
                        echo $this->db->query('SELECT tahun_akademik FROM `tahun_akademik` WHERE `kode_tahunakademik` = "' . $value->kode_tahunakademik . '"')->result()[0]->tahun_akademik;
                        ?>
                    </td>
                    <td><?php echo $value->tanggal ?></td>
                    <td><?php echo $value->pertemuan ?></td>
                    <td><?php echo $value->hadir ?></td>
                    <td><?php echo $value->alpha ?></td>
                    <td><?php echo $value->ijin ?></td>
                    <td><?php echo $value->sakit ?></td>
                    <!-- <td>
                        <a href="<?php echo base_url('user/presensi/update/' . $value->id_presensi . '/' . $nis) ?>">
                            <div class="btn btn-sm btn-info"><i class="fa fa-edit"></i></div>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo base_url('user/presensi/hapuspresensi/' . $value->id_presensi . '/' . $nis) ?>">
                            <div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>
                        </a>
                    </td> -->
                </tr>
            <?php
                $no++;
            }
            ?>
            <tr>
                <td colspan="4">Total</td>
                <td><?php echo $total_pertemuan ?></td>
                <td><?php echo $total_hadir ?></td>
                <td><?php echo $total_alpha ?></td>
                <td><?php echo $total_ijin ?></td>
                <td><?php echo $total_sakit ?></td>
            </tr>
            <!-- <?php var_dump($nis) ?> -->
        </tbody>



    </table>