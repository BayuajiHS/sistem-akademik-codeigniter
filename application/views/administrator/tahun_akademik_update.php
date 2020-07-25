<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Form Update Tahun Akademik
    </div>
    <?php
        foreach ($tahun_akademik as $ta) :
    ?>
    <form method="post" action="<?php echo base_url('administrator/tahun_akademik/tahun_akademik_update_aksi') ?>">
        <div class="form-group">
            <label for="">Tahun Akademik</label>
            <input type="hidden" name="id" value="<?php echo $ta->id ?>" class="form-control">
            <input type="text" name="tahun_akademik" value="<?php echo $ta->tahun_akademik ?>" class="form-control" placeholder="Masukkan Tahun Akademik...">
            <?php echo form_error('tahun_akademik','<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label for="">Semester</label>
            <select name="semester" class="form-control">
                <option><?php echo $ta->semester ?></option>
                <option>Ganjil</option>
                <option>Genap</option>
            </select>
            <?php echo form_error('semester','<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="form-control">
                <option><?php echo $ta->status ?></option>
                <option>Aktif</option>
                <option>Tidak Aktif</option>
            </select>
            <?php echo form_error('status','<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <?php endforeach; ?>
</div>