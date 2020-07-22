<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Prodi
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/prodi/tambah_prodi','<button class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Prodi</button>') ?>
    
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th width="20px">NO</th>
            <th>KODE PRODI</th>
            <th>NAMA PRODI</th>
            <th>NAMA JURUSAN</th>
            <th colspan="2">AKSI</th>
            
            <?php 
            $no = 1;
            foreach($prodi as $pr) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pr->kode_prodi ?></td>
                <td><?php echo $pr->nama_prodi ?></td>
                <td><?php echo $pr->nama_jurusan ?></td>
                <td width="20px"><?php echo anchor('administrator/prodi/update/'.$pr->id_prodi,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('administrator/prodi/delete/'.$pr->id_prodi,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
            <?php endforeach; ?>
        </tr>
    </table>
</div>