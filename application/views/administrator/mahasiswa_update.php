<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Form Update Mahasiswa
    </div>

    <?php foreach($mahasiswa as $mhs) : ?>
    <?php echo form_open_multipart('administrator/mahasiswa/update_mahasiswa_aksi'); ?> <!-- form open multipart untuk memberi akses upload !-->
        <div class="form-group">
            <label for="">NIM</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $mhs->id ?>">
            <input type="text" name="nim" class="form-control" value="<?php echo $mhs->nim ?>">
            <?php echo form_error('nim','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">NAMA MAHASISWA</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $mhs->nama_lengkap ?>">
            <?php echo form_error('nama_lengkap','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">ALAMAT</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $mhs->alamat ?>">
            <?php echo form_error('alamat','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">EMAIL</label>
            <input type="text" name="email" class="form-control" value="<?php echo $mhs->email ?>">
            <?php echo form_error('email','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">TELEPON</label>
            <input type="text" name="telepon" class="form-control" value="<?php echo $mhs->telepon ?>">
            <?php echo form_error('telepon','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">TEMPAT LAHIR</label>
            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $mhs->tempat_lahir ?>">
            <?php echo form_error('tempat_lahir','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">TANGGAL LAHIR</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $mhs->tanggal_lahir ?>">
            <?php echo form_error('tanggal_lahir','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">JENIS KELAMIN</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="<?php echo $mhs->jenis_kelamin ?>"><?php echo $mhs->jenis_kelamin ?></option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
            <?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">PROGRAM STUDI</label>
            <select name="nama_prodi" class="form-control">
                <option value="<?php echo $mhs->nama_prodi ?>"><?php echo $mhs->nama_prodi ?></option>
                <?php foreach($prodi as $pr) : ?>
                <option value="<?php echo $pr->nama_prodi ?>"><?php echo $pr->nama_prodi?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('nama_prodi','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <?php foreach($detail as $dt) : ?>
                <img width="250px" height="250px" class="mb-3" src="<?php echo base_url ('assets/uploads/').$dt->photo ?>" alt="">
            <?php endforeach; ?><br>
            <label>FOTO</label><br>
            <input type="file" name="userfile" value="<?php echo $dt->photo ?>">
        </div>

        <button type="submit" class="btn btn-sm btn-primary mb-3">Simpan</button>
    <?php echo form_close(); ?>
    <?php endforeach; ?>
</div>