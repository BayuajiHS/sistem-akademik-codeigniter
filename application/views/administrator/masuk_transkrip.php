<div class="container-fluid">
    <div class="alert alert-success"><i class="fas fa-university"></i>
        Form Masuk Halaman Transkrip Nilai
    </div>

    <form action="<?php echo base_url('administrator/transkrip_nilai/masuk_krs_aksi') ?>" method="post">
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM...">
        </div>

        <button type="submit" class="btn btn-primary">Proses</button>
    </form>
</div>