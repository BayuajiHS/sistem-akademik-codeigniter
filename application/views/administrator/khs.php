<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>
        Kartu Hasil Studi (KRS)
    </div>

    <center>
        <legend class="mt-3"><strong>KARTU HASIL STUDI</strong></legend>

        <table>
            <tr>
                <td><strong>NIM</strong></td>
                <td>&nbsp;:&nbsp;<?php echo $mhs_nim ?></td> <!-- $mhs_nim diambil dari controller KHS, line 52 !-->
            </tr>
            <tr>
                <td><strong>NAMA LENGKAP</strong></td>
                <td>&nbsp;:&nbsp;<?php echo $mhs_nama ?></td>
            </tr>
            <tr>
                <td><strong>PROGRAM STUDI</strong></td>
                <td>&nbsp;:&nbsp;<?php echo $mhs_prodi ?></td> <!-- $mhs_prodi diambil dari controller KHS, line 54. Begitu jg dgn yg lainnya !-->
            </tr>
            <tr>
                <td><strong>TAHUN AKADEMIK (SEMESTER)</strong></td>
                <td>&nbsp;:&nbsp;<?php echo $thn_akad ?></td> 
            </tr>
        </table>
    </center>

    <?php echo anchor('administrator/krs/print','<button class="btn btn-info btn-sm mt-3"><i class="fas fa-print fa-sm"></i> Print</button>') ?>

    <table class="table table-bordered table-striped table-hover mt-2">
        <tr>
            <th>NO</th>
            <th>KODE MATAKULIAH</th>
            <th>NAMA MATAKULIAH</th>
            <th>SKS</th>
            <th>NILAI</th>
            <th>SKOR</th>
        </tr>
        <?php
            $jumlahSks=0;
            $no=1;
            $jumlahNilai=0;
            foreach($mhs_data as $dt) : 
        ?> <!-- $krs_data didapatkan dari controller KRS line ke 49 !-->
        <tr>
            <td width="20px"><?php echo $no++ ?></td>
            <td><?php echo $dt->kode_matakuliah ?></td> <!-- Data" ini diambil dari 'krs_data' => $this->baca_krs($nim,$id_thn_akad), yang ada didalam fungsi baca_krs() !-->
            <td><?php echo $dt->nama_matakuliah ?></td>
            <td><?php echo $dt->sks ?></td>
            <td><?php echo $dt->nilai ?></td>
            <td><?php echo skorNilai($dt->nilai,$dt->sks)?></td>
            <?php 
                $jumlahSks      = $jumlahSks + $dt->sks;
                $jumlahNilai    = $jumlahNilai + skorNilai($dt->nilai,$dt->sks)
            ?>
        </tr>

        <?php endforeach; ?>
        <tr>
            <td colspan="3" align="right"><strong>JUMLAH</strong></td>
            <td><strong><?php echo $jumlahSks?></strong></td>
            <td><strong><?php echo $jumlahNilai?></strong></td>
        </tr>
    </table>

    Index Prestasi : 
    <?php if(number_format($jumlahNilai/$jumlahSks,2) == 0) {
        echo "Belum ada Nilai";
    }else
    {
        echo number_format($jumlahNilai/$jumlahSks,2);
    }
    ?>
</div>