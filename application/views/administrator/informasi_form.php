<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Form Input Informasi
    </div>

    <?php echo form_open_multipart('administrator/informasi_kampus/tambah_informasi_aksi'); ?> <!-- form open multipart untuk memberi akses upload !-->
        <div class="form-group">
            <label for="">ICON</label>
            <input type="text" name="icon" class="form-control">
            <?php echo form_error('icon','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">JUDUL INFORMASI</label>
            <input type="text" name="judul_informasi" class="form-control">
            <?php echo form_error('judul_informasi','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">ISI INFORMASI</label>
            <textarea name="isi_informasi" id="" cols="30" rows="5" class="form-control"></textarea>
            <?php echo form_error('isi_informasi','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <button type="submit" class="btn btn-sm btn-primary mb-3">Simpan</button>
    <?php echo form_close(); ?>
</div>