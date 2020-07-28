<div class="container-fluid">
    <center>
        <legend><strong>TRANSKRIP NILAI</strong></legend>

        <table>
            <tr>
                <td>NIM</td>
                <td>: <?php echo $nim ?></td>
            </tr>
            <tr>
                <td>NAMA MAHASISWA</td>
                <td>: <?php echo $nama ?></td>
            </tr>
            <tr>
                <td>PROGRAM STUDI</td>
                <td>: <?php echo $prodi ?></td>
            </tr>
        </table>
    </center>

    <table class="table table-striped table-bordered table-hover mt-3">
        <tr>
            <th>NO</th>
            <th>KODE MATAKULIAH</th>
            <th>NAMA MATAKULIAH</th>
            <th align="center">SKS</th>
            <th align="center">NILAI</th>
            <th align="center">SKOR</th>
        </tr>
        <?php
            $no=1;
            $Jsks=0;
            $Jskor=0;

            foreach($transkrip as $tr) :
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $tr->kode_matakuliah ?></td>
            <td><?php echo $tr->nama_matakuliah ?></td>
            <td align="center"><?php echo $tr->sks ?></td>
            <td align="center"><?php echo $tr->nilai ?></td>
            <td align="center"><?php echo skorNilai($tr->nilai,$tr->sks) ?></td>

            <?php
                $Jsks+=$tr->sks;
                $Jskor+=skorNilai($tr->nilai,$tr->sks);
            ?>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Jumlah SKS</td>
            <td align="center"><?php echo $Jsks ?></td>
            <td align="center">-</td>
            <td align="center"><?php echo $Jskor ?></td>
        </tr>
    </table>

    <p class="text-center">Indeks Prestasi Kumulatif (IPK) : <?php echo number_format($Jskor/$Jsks,2) ?></p>
</div>