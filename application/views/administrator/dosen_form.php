<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Form Input Dosen
    </div>

    <?php echo form_open_multipart('administrator/dosen/tambah_dosen_aksi'); ?> <!-- form open multipart untuk memberi akses upload !-->
        <div class="form-group">
            <label for="">NIDN</label>
            <input type="text" name="nidn" class="form-control">
            <?php echo form_error('nidn','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">NAMA DOSEN</label>
            <input type="text" name="nama_dosen" class="form-control">
            <?php echo form_error('nama_dosen','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">ALAMAT</label>
            <input type="text" name="alamat" class="form-control">
            <?php echo form_error('alamat','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">EMAIL</label>
            <input type="text" name="email" class="form-control">
            <?php echo form_error('email','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">TELEPON</label>
            <input type="text" name="telepon" class="form-control">
            <?php echo form_error('telepon','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">JENIS KELAMIN</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="">--Pilih Jenis Kelamin--</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
            <?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>FOTO</label><br>
            <input type="file" name="foto">
            <?php echo form_error('foto','<div class="text-danger small ml-3">','</div>')?>
        </div>

        <button type="submit" class="btn btn-sm btn-primary mb-3">Simpan</button>
    <?php echo form_close(); ?>
</div>