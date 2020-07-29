<div class="container-fluid">
    <div class="alert alert-success"><i class="fa fa-users"></i>
        Halaman User
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/users/tambah_user','<div class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Tambah User</div>') ?>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="20px">No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Level</th>
            <th>Blokir</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php $no=1; foreach($users as $us) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $us->username ?></td>
            <td><?php echo $us->email ?></td>
            <td><?php echo $us->level ?></td>
            <td width="120px"><?php echo $us->blokir ?></td>
            <td width="20px"><?php echo anchor('administrator/users/update/'.$us->id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
            <td width="20px"><?php echo anchor('administrator/users/delete/'.$us->id,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>