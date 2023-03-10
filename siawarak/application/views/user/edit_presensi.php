<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Update Presensi
    </div>

    <form action="<?php echo base_url('user/presensi/update_presensi_aksi');?>" method="post">
    <?php
if ($presensi != null) {
?>
    <form>
        <div class="form-group">
            <input type="hidden" name="id_presensi" value="<?php echo $presensi->id_presensi;  ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $presensi->id_presensi; ?>">
        <div class="form-group">
            <label for="kode_mp">Kode Mata Pelajaran</label>
            <input type="text" name="kode_mp" class="form-control" value="<?php echo $presensi->kode_mp; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="pertemuan">Pertemuan Ke-</label>
            <input type="text" name="pertemuan" class="form-control" value="<?php echo $presensi->pertemuan; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?php echo $presensi->tanggal; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="kode_semester">Kode Semester</label>
            <input type="text" name="kode_semester" class="form-control" value="<?php echo $presensi->kode_semester; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="kode_ta">Kode Tahun Ajaran</label>
            <input type="text" name="kode_ta" class="form-control" value="<?php echo $presensi->kode_ta; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nis">Nomor Induk Siswa</label>
            <input type="text" name="nis" class="form-control" value="<?php echo $presensi->nis; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="hadir">Jumlah Hadir</label>
            <input type="text" name="hadir" class="form-control" value="<?php echo $presensi->hadir; ?>">
        </div>
        <div class="form-group">
            <label for="alpha">Jumlah Alpha</label>
            <input type="text" name="alpha" class="form-control" value="<?php echo $presensi->alpha; ?>">
        </div>
        <div class="form-group">
            <label for="ijin">Jumlah Ijin</label>
            <input type="text" name="ijin" class="form-control" value="<?php echo $presensi->ijin; ?>">
        </div>
        <div class="form-group">
            <label for="sakit">Jumlah Sakit</label>
            <input type="text" name="sakit" class="form-control" value="<?php echo $presensi->sakit; ?>">
        </div>
        <button type="submit" class="btn btn-primary mb-5 mt-3">Update</button>
        <a href="<?php echo base_url('user/presensi/detailpresensi/'.$presensi->nis) ?>" class="btn btn-warning mb-5 mt-3">Kembali</a>
    </form>
   
<?php
} else {
    echo "Data presensi tidak ditemukan.";
}
?>


