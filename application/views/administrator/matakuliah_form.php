<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Form Input Matakuliah
    </div>
    <form action="<?php echo base_url('administrator/matakuliah/tambah_matakuliah_aksi') ?>" method="post">
        <div class="form-group">
            <label>KODE MATAKULIAH</label>
            <input type="text" name="kode_matakuliah" class="form-control">
            <?php echo form_error('kode_matakuliah', '<div class="small text-danger ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>NAMA MATAKULIAH</label>
            <input type="text" name="nama_matakuliah" class="form-control">
            <?php echo form_error('nama_matakuliah', '<div class="small text-danger ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>SKS</label>
            <select name="sks" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
            </select>
            <?php echo form_error('sks', '<div class="small text-danger ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>SEMESTER</label>
            <select name="semester" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
            </select>
            <?php echo form_error('semester', '<div class="small text-danger ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>PROGRAM STUDI</label>
            <select name="nama_prodi" class="form-control">
                <option value="">--Pilih Program Studi--</option>
                <?php foreach($prodi as $pr) : ?>
                <option value="<?php echo $pr->nama_prodi?>"><?php echo $pr->nama_prodi?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('nama_prodi', '<div class="small text-danger ml-3">','</div>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>
</div>