<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Form Update Informasi
    </div>

    <?php foreach($informasi as $inf) : ?>
    <?php echo form_open_multipart('administrator/informasi_kampus/informasi_update_aksi'); ?> <!-- form open multipart untuk memberi akses upload !-->
        <div class="form-group">
            <label for="">ICON</label>
            <input type="hidden" name="id_informasi" value="<?php echo $inf->id_informasi ?>">
            <input type="text" name="icon" class="form-control" value="<?php echo $inf->icon ?>">
        </div>
        <div class="form-group">
            <label for="">JUDUL INFORMASI</label>
            <input type="text" name="judul_informasi" class="form-control" value="<?php echo $inf->judul_informasi ?>">
        </div>
        <div class="form-group">
            <label for="">ISI INFORMASI</label>
            <textarea name="isi_informasi" cols="30" rows="5" class="form-control"><?php echo $inf->isi_informasi ?></textarea>
        </div>
        <button type="submit" class="btn btn-sm btn-primary mb-3">Simpan</button>
    <?php echo form_close(); ?>
    <?php endforeach; ?>
</div>