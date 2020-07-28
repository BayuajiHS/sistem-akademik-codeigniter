<div class="container-fluid">
    <div class="alert alert-success"><i class="fas fa-university"></i>
        Halaman Dosen
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/dosen/tambah_dosen','<button class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Tambah Dosen</button>') ?>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NIDN</th>
            <th>NAMA DOSEN</th>
            <th>EMAIL</th>
            <th>TELEPON</th>
            <th colspan="3">AKSI</th>
        </tr>
        <?php foreach($dosen as $ds) : ?>
        <tr>
            <td><?php echo $ds->nidn ?></td>
            <td><?php echo $ds->nama_dosen ?></td>
            <td><?php echo $ds->email ?></td>
            <td><?php echo $ds->telepon ?></td>
            <td width="10px"><?php echo anchor('administrator/dosen/detail/'.$ds->id_dosen,'<div class="btn btn-sm btn-success"><i class="fa fa-eye"></i></div>') ?></td>
            <td width="10px"><?php echo anchor('administrator/dosen/update/'.$ds->id_dosen,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
            <td width="10px"><?php echo anchor('administrator/dosen/delete/'.$ds->id_dosen,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>