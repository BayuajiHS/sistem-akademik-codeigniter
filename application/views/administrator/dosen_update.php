<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Form Update Dosen
    </div>
    <?php foreach($dosen as $ds) : ?>
    <form method="post" action="<?php echo base_url ('administrator/dosen/dosen_update_aksi') ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>NIDN</label>
            <input type="hidden" name="id_dosen" value="<?php echo $ds->id_dosen ?>">
            <input type="text" name="nidn" class="form-control" value="<?php echo $ds->nidn ?>">
        </div>
        <div class="form-group">
            <label>NAMA DOSEN</label>
            <input type="text" name="nama_dosen" class="form-control" value="<?php echo $ds->nama_dosen ?>">
        </div>
        <div class="form-group">
            <label>ALAMAT</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $ds->alamat ?>">
        </div>
        <div class="form-group">
            <label>EMAIL</label>
            <input type="text" name="email" class="form-control" value="<?php echo $ds->email ?>">
        </div>
        <div class="form-group">
            <label>TELEPON</label>
            <input type="text" name="telepon" class="form-control" value="<?php echo $ds->telepon ?>">
        </div>
        <div class="form-group">
            <label for="">JENIS KELAMIN</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="<?php echo $ds->jenis_kelamin ?>"><?php echo $ds->jenis_kelamin ?></option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <img width="250px" height="250px" class="mb-3" src="<?php echo base_url ('assets/uploads/').$ds->foto ?>" alt=""><br>
            <label>FOTO</label><br>
            <input type="file" name="userfile" value="<?php echo $ds->foto ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-sm mb-3">Simpan</button>
    </form>
    <?php endforeach; ?>
</div>