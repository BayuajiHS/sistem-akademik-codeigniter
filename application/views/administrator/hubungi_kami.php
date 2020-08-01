<div class="container-fluid">
    <div class="alert alert-success"><i class="fas fa-university"></i>
        Halaman Hubungi Kami
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th width="10px">NO</th>
            <th>NAMA PENGIRIM</th>
            <th>EMAIL</th>
            <th>ISI PESAN</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php 
            $no=1; 
            foreach($hubungi as $hub) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $hub->nama ?></td>
            <td><?php echo $hub->email ?></td>
            <td><?php echo $hub->pesan ?></td>
            <td width="10px"><?php echo anchor('administrator/hubungi_kami/kirim_email/'.$hub->id_hubungi,'<div class="btn btn-sm btn-success"><i class="fa fa-envelope"></i></div>') ?></td>
            <td width="10px"><?php echo anchor('administrator/hubungi_kami/delete/'.$hub->id_hubungi,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>