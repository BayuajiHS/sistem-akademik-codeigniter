<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Kartu Rencana Studi (KRS)
    </div>

    <center>
        <legend class="mt-3"><strong>Kartu Rencana Studi</strong></legend>

        <table>
            <tr>
                <td><strong>NIM</strong></td>
                <td>&nbsp;:&nbsp;<?php echo $nim ?></td> <!-- $nim diambil dari controller KRS, line 50 !-->
            </tr>
            <tr>
                <td><strong>NAMA LENGKAP</strong></td>
                <td>&nbsp;:&nbsp;<?php echo $nama_lengkap ?></td>
            </tr>
            <tr>
                <td><strong>PROGRAM STUDI</strong></td>
                <td>&nbsp;:&nbsp;<?php echo $prodi ?></td> <!-- $prodi diambil dari controller KRS, line 55. Begitu jg dgn yg lainnya !-->
            </tr>
            <tr>
                <td><strong>TAHUN AKADEMIK (SEMESTER)</strong></td>
                <td>&nbsp;:&nbsp;<?php echo $tahun_akademik.'&nbsp;('.$semester.')' ?></td> 
            </tr>
        </table>
    </center>

    <?php echo anchor('administrator/krs/tambah_krs','<button class="btn btn-primary btn-sm mt-3"><i class="fas fa-plus fa-sm"></i> Tambah Data KRS</button>') ?>
    <?php echo anchor('administrator/krs/print','<button class="btn btn-info btn-sm mt-3"><i class="fas fa-print fa-sm"></i> Print</button>') ?>

    <table class="table table-bordered table-striped table-hover mt-2">
        <tr>
            <th>NO</th>
            <th>KODE MATAKULIAH</th>
            <th>NAMA MATAKULIAH</th>
            <th>SKS</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php
            $no=1;
            foreach($krs_data as $krs) : 
        ?> <!-- $krs_data didapatkan dari controller KRS line ke 49 !-->
        <tr>
            <td width="20px"><?php echo $no++ ?></td>
            <td><?php echo $krs->kode_matakuliah ?></td> <!-- Data" ini diambil dari 'krs_data' => $this->baca_krs($nim,$id_thn_akad), yang ada didalam fungsi baca_krs() !-->
            <td><?php echo $krs->nama_matakuliah ?></td>
            <td>
                <?php echo $krs->sks; 
                            $jumlahSks = $jumlahSks + $krs->sks;
                ?>
            </td>
            <td><?php echo anchor('administrator/krs/update/'.$krs->id_krs.'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
            <td><?php echo anchor('administrator/krs/delete/'.$krs->id_krs.'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        <tr>
            <td colspan="3" align="right"><strong>JUMLAH SKS</strong></td>
            <td><strong><?php echo $jumlahSks?></strong></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>