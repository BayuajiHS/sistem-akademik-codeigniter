<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Form Update Matakuliah
    </div>

    <?php foreach($matakuliah as $mk) : ?>

        <form action="<?php echo base_url('administrator/matakuliah/update_aksi'); ?>" method="post">

            <div class="form-group">
                <label>NAMA MATAKULIAH</label>
                <input type="hidden" name="kode_matakuliah" class="form-control" value="<?php echo $mk->kode_matakuliah ?>">
                <input type="text" name="nama_matakuliah" class="form-control" value="<?php echo $mk->nama_matakuliah ?>">
            </div>

            <div class="form-group">
                <label>SKS</label>
                <select name="sks" class="form-control">
                    <option><?php echo $mk->sks ?></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
            </div>

            <div class="form-group">
                <label>SEMESTER</label>
                <select name="semester" class="form-control">
                    <option><?php echo $mk->semester ?></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
            </div>

            <div class="form-group">
                <label>PROGRAM STUDI</label>
                <select name="nama_prodi" class="form-control">
                    <option><?php echo $mk->nama_prodi ?></option>
                    <?php foreach($prodi as $pr) : ?>
                        <option value="<?php echo $pr->nama_prodi ?>"><?php echo $pr->nama_prodi ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>