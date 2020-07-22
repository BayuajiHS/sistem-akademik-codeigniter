<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Matakuliah
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/matakuliah/tambah_matakuliah','<button class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Matakuliah</button>') ?>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th width="20px">NO</th>
            <th>KODE MATAKULIAH</th>
            <th>NAMA MATAKULIAH</th>
            <th>NAMA PRODI</th>
            <th colspan="3">AKSI</th>
        </tr>
        <?php $no=1; foreach($matakuliah as $mtk) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $mtk->kode_matakuliah ?></td>
            <td><?php echo $mtk->nama_matakuliah ?></td>
            <td><?php echo $mtk->nama_prodi ?></td>
            <td width="20px"><?php echo anchor('administrator/matakuliah/detail/'.$mtk->kode_matakuliah,'<div class="btn btn-success btn-sm"><i class="fa fa-eye"></i></div>') ?></td>
            <td width="20px"><?php echo anchor('administrator/matakuliah/update/'.$mtk->kode_matakuliah,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
            <td width="20px"><?php echo anchor('administrator/matakuliah/delete/'.$mtk->kode_matakuliah,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>