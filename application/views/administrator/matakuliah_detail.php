<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i>
        Detail Matakuliah
    </div>

    <table class="table table-hover table-striped table-bordered">
        <?php foreach($detail as $dt) : ?>
        <tr>
            <th><strong>KODE MATAKULIAH</strong></th>
            <td><?php echo $dt->kode_matakuliah ?></td>
        </tr>
        <tr>
            <th><strong>NAMA MATAKULIAH</th>
            <td><?php echo $dt->nama_matakuliah ?></td>
        </tr>
        <tr>
            <th><strong>SKS</strong></th>
            <td><?php echo $dt->sks ?></td>
        </tr>
        <tr>
            <th><strong>SEMESTER</strong></th>
            <td><?php echo $dt->semester ?></td>
        </tr>
        <tr>
            <th><strong>PROGRAM STUDI</strong></th>
            <td><?php echo $dt->nama_prodi ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php echo anchor('administrator/matakuliah','<div class="btn btn-sm btn-primary">< Kembali</div>') ?>
</div>