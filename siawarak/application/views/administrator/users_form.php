<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i> Form Tambah User
    </div>


    <?php echo form_open_multipart('administrator/users/tambah_users_aksi') ?>
    

    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Masukan Username">
        <?php echo form_error('username','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" class="form-control" placeholder="Masukan Password">
        <?php echo form_error('password','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Masukan Email">
        <?php echo form_error('email','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Level</label>
        <select name="level" class="form-control">
            <?php
            if ($level == 'admin') {
            ?>
            <option value="admin" selected>Admin</option>
            <option value="user">User</option>

            <?php
            } elseif ($level == 'user') {
            ?>

            <option value="admin">Admin</option>
            <option value="user" selected>User</option>

            <?php
            } else{
            ?>
            <option value="admin">Admin</option>
            <option value="user">User</option>

            <?php } ?>
            
        </select>
        <?php echo form_error('level','<div class="text-danger small ml-3">','</div>')?>
    </div>

    <div class="form-group">
        <label>Blokir</label>
        <select name="blokir" class="form-control">
            <?php
            if ($blokir == 'Y') {
            ?>
            <option value="Y" selected>Ya</option>
            <option value="N">Tidak</option>

            <?php
            } elseif ($blokir == 'N') {
            ?>

            <option value="Y">Ya</option>
            <option value="N" selected>Tidak</option>

            <?php
            } else{
            ?>
            <option value="Y">Ya</option>
            <option value="N">Tidak</option>

            <?php } ?>
            
        </select>
        <?php echo form_error('blokir','<div class="text-danger small ml-3">','</div>')?>
    </div>

    
    <a href="<?php echo base_url('administrator/users') ?>" class="btn btn-warning mb-5 mt-3">Kembali</a>
    <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>

    <?php form_close(); ?>
</div>