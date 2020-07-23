<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i>
        Detail Mahasiswa
    </div>

    <table class="table table-bordered table-hover table-striped">
        <?php foreach($mahasiswa as $mhs) : ?>

        <img width="250px" height="250px" class="mb-3" src="<?php echo base_url('assets/uploads/').$mhs->photo ?>">

        <tr>
            <th><strong>NIM</strong></th>
            <td><?php echo $mhs->nim ?></td>
        </tr>
        <tr>
            <th><strong>NAMA MAHASISWA</strong></th>
            <td><?php echo $mhs->nama_lengkap ?></td>
        </tr>
        <tr>
            <th><strong>ALAMAT</strong></th>
            <td><?php echo $mhs->alamat ?></td>
        </tr>
        <tr>
            <th><strong>EMAIL</strong></th>
            <td><?php echo $mhs->email ?></td>
        </tr>
        <tr>
            <th><strong>TELEPON</strong></th>
            <td><?php echo $mhs->telepon ?></td>
        </tr>
        <tr>
            <th><strong>TEMPAT LAHIR</strong></th>
            <td><?php echo $mhs->tempat_lahir ?></td>
        </tr>
        <tr>
            <th><strong>TANGGAL LAHIR</strong></th>
            <td><?php echo $mhs->tanggal_lahir ?></td>
        </tr>
        <tr>
            <th><strong>JENIS KELAMIN</strong></th>
            <td><?php echo $mhs->jenis_kelamin ?></td>
        </tr>
        <tr>
            <th><strong>PROGRAM STUDI</strong></th>
            <td><?php echo $mhs->nama_prodi ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php echo anchor('administrator/mahasiswa','<div class="btn btn-primary btn-sm mb-3">< Kembali</div>') ?>
</div>