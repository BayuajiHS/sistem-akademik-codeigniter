<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i>
        Form Tambah User
    </div>
    <form method="post" action="<?php echo base_url('administrator/users/tambah_user_aksi') ?>">
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username...">
            <?php echo form_error('username','<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password...">
            <?php echo form_error('password','<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Masukkan Email...">
            <?php echo form_error('email','<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label for="">Level</label>
            <select name="level" class="form-control">
                <?php if ($level == 'admin') { ?>
                    <option value="admin" selected>admin</option>
                    <option value="user">user</option>
                <?php } elseif($level == 'user') { ?>
                    <option value="admin">admin</option>
                    <option value="user" selected>user</option>
                <?php } else { ?>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                <?php } ?>
            </select>
            <?php echo form_error('level','<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label for="">Blokir</label>
            <select name="blokir" class="form-control">
                <?php if ($level == 'Y') { ?>
                    <option value="Y" selected>Y</option>
                    <option value="N">N</option>
                <?php } elseif($level == 'N') { ?>
                    <option value="Y">Y</option>
                    <option value="N" selected>N</option>
                <?php } else { ?>
                    <option value="Y">Y</option>
                    <option value="N">N</option>
                <?php } ?>
            </select>
            <?php echo form_error('blokir','<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
    </form>
</div>

