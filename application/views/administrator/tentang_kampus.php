<div class="container-fluid">
    <div class="alert alert-success"><i class="fa fa-users"></i>
        Halaman Tentang Kampus
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="20px">No</th>
            <th>Sejarah</th>
            <th>Visi</th>
            <th>Misi</th>
            <th>Aksi</th>
        </tr>
        <?php $no=1; foreach($tentang as $tg) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $tg->sejarah ?></td>
            <td><?php echo $tg->visi ?></td>
            <td><?php echo $tg->misi ?></td>
            <td width="20px"><?php echo anchor('administrator/tentang_kampus/update/'.$tg->id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>