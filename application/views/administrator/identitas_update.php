<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Form Edit Identitas
    </div>
    <?php foreach($identitas as $idnt) : ?>
    <form method="post" action="<?php echo base_url('administrator/identitas/update_aksi') ?>">
        <div class="form-group">
            <label for="">Nama Website</label>
            <input type="hidden" name="id_identitas" class="form-control" value="<?php echo $idnt->id_identitas ?>">
            <input type="text" name="nama_website" class="form-control" value="<?php echo $idnt->nama_website ?>">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $idnt->alamat ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $idnt->email ?>">
        </div>
        <div class="form-group">
            <label for="">No Telepon</label>
            <input type="text" name="telepon" class="form-control" value="<?php echo $idnt->telepon ?>">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
    </form>
    <?php endforeach; ?>
</div>