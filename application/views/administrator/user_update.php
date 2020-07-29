<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Form Edit User
    </div>
    <?php foreach($users as $us) : ?>
    <form method="post" action="<?php echo base_url('administrator/users/update_aksi') ?>">
        <div class="form-group">
            <label for="">Username</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $us->id ?>">
            <input type="text" name="username" class="form-control" value="<?php echo $us->username ?>">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $us->password ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $us->email ?>">
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
        </div>
        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
    </form>
    <?php endforeach; ?>
</div>