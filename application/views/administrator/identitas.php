<div class="container-fluid">
    <div class="alert alert-success"><i class="fa fa-users"></i>
        Halaman Identitas
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="20px">No</th>
            <th>Nama Website</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php $no=1; foreach($identitas as $idnt) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $idnt->nama_website ?></td>
            <td><?php echo $idnt->alamat ?></td>
            <td><?php echo $idnt->email ?></td>
            <td><?php echo $idnt->telepon ?></td>
            <td width="20px"><?php echo anchor('administrator/identitas/update/'.$idnt->id_identitas,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>