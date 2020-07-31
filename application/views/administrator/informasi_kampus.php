<div class="container-fluid">
    <div class="alert alert-success"><i class="fas fa-university"></i>
        Halaman Informasi Kampus
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/informasi_kampus/tambah_informasi','<button class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Tambah Informasi</button>') ?>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>ICON</th>
            <th>JUDUL INFORMASI</th>
            <th>ISI INFORMASI</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php $no=1; foreach($informasi as $inf) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $inf->icon ?></td>
            <td><?php echo $inf->judul_informasi ?></td>
            <td><?php echo $inf->isi_informasi ?></td>
            <td width="10px"><?php echo anchor('administrator/informasi_kampus/update/'.$inf->id_informasi,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
            <td width="10px"><?php echo anchor('administrator/informasi_kampus/delete/'.$inf->id_informasi,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>