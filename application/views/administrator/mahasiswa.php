<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Mahasiswa
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/mahasiswa/tambah_mahasiswa','<button class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mahasiswa</button>') ?>

    
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th width="10px">NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>EMAIL</th>
            <th>TELEPON</th>
            <th>NAMA PRODI</th>
            <th colspan="3">AKSI</th>
        </tr>
        <?php foreach($mahasiswa as $mhs) : ?>
        <tr>
            
            <td><?php echo $mhs->nim ?></td>
            <td><?php echo $mhs->nama_lengkap ?></td>
            <td><?php echo $mhs->email ?></td>
            <td><?php echo $mhs->telepon ?></td>
            <td><?php echo $mhs->nama_prodi ?></td>
            <td width="10px"><?php echo anchor('administrator/mahasiswa/detail/'.$mhs->id,'<div class="btn btn-sm btn-success"><i class="fa fa-eye"></i></div>') ?></td>
            <td width="10px"><?php echo anchor('administrator/mahasiswa/update/'.$mhs->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
            <td width="10px"><?php echo anchor('administrator/mahasiswa/delete/'.$mhs->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>