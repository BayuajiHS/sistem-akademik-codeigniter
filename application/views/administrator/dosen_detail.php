<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i>
        Detail Dosen
    </div>

    <table class="table table-bordered table-hover table-striped">
        <?php foreach($dosen as $ds) : ?>

        <img width="250px" height="250px" class="mb-2" src="<?php echo base_url('assets/uploads/').$ds->foto ?>">

        <tr>
            <th><strong>NIDN</strong></th>
            <td><?php echo $ds->nidn ?></td>
        </tr>
        <tr>
            <th><strong>NAMA DOSEN</strong></th>
            <td><?php echo $ds->nama_dosen ?></td>
        </tr>
        <tr>
            <th><strong>ALAMAT</strong></th>
            <td><?php echo $ds->alamat ?></td>
        </tr>
        <tr>
            <th><strong>EMAIL</strong></th>
            <td><?php echo $ds->email ?></td>
        </tr>
        <tr>
            <th><strong>TELEPON</strong></th>
            <td><?php echo $ds->telepon ?></td>
        </tr>
        <tr>
            <th><strong>JENIS KELAMIN</strong></th>
            <td><?php echo $ds->jenis_kelamin ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php echo anchor('administrator/dosen','<div class="btn btn-primary btn-sm mb-3">< Kembali</div>') ?>
</div>