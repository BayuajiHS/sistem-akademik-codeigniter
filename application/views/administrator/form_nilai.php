<?php
    $nilai = get_instance();
    $nilai->load->model('matakuliah_model');
    $nilai->load->model('tahunakademik_model');
?>

<div class="container-fluid">
    <?php
        if($list_nilai == NULL)
        {
            $thn = $nilai->tahunakademik_model->get_by_id($id_thn_akad);
            $semester = $thn->semester=='Ganjil';

            if($semester == 'Ganjil')
            {
                $tampilSemester = 'Ganjil';
            }
            else
            {
                $tampilSemester = 'Genap';
            }
    ?>

    <div class="alert alert-danger">
        Maaf, Kode Matakuliah yang Diinput <strong>Tidak Tersedia</strong> di Tahun Ajaran <?php echo $thn->tahun_akademik . "(" . $thn->semester . ")"; ?>
    </div>

    <?php echo anchor('administrator/khs/nilai','<div class="btn btn-sm btn-primary">Kembali</div>') ?>

    <?php 
        } else {
    ?>
        <center>
            <legend><strong>MASUKKAN NILAI AKHIR</strong></legend>

            <table>
                <tr>
                    <td>Kode Matakuliah</td>
                    <td>: <?php echo $kode_matakuliah ?></td>
                </tr>
                <tr>
                    <td>Nama Matakuliah</td>
                    <td>: <?php echo $nilai->matakuliah_model->get_by_id($kode_matakuliah)->nama_matakuliah ?></td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td>: <?php echo $nilai->matakuliah_model->get_by_id($kode_matakuliah)->sks ?></td>
                </tr>
                <?php
                    $thn      = $nilai->tahunakademik_model->get_by_id($id_thn_akad);
                    $semester = $thn->semester=='Ganjil';

                    if($semester == 'Ganjil')
                    {
                        $tampilSemester = 'Ganjil';
                    }
                    else
                    {
                        $tampilSemester = 'Genap';
                    }
                ?>
                <tr>
                    <td>Tahun Akademik (Semester)</td>
                    <td>: <?php echo $thn->tahun_akademik ."(".$tampilSemester.")"; ?></td>
                </tr>
            </table>
        </center>

        <form action="<?php echo base_url('administrator/khs/simpan_nilai')?>" method="post">
            <table class="table table-striped table-bordered table-hover mt-3">
                <tr>
                    <td width="25px">NO</td>
                    <td>NIM</td>
                    <td>NAMA MAHASISWA</td>
                    <td>NILAI</td>
                </tr>
                <?php
                    $no=1;

                    foreach($list_nilai as $ln) :
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $ln->nim ?></td>
                    <td><?php echo $ln->nama_lengkap ?></td>
                    <input type="hidden" name="id_krs[]" value="<?php $ln->id_krs ?>">
                    <td width="85px"><input type="text" name="nilai[]" class="form-control" value="<?php echo $ln->nilai ?>"></td>
                </tr>
                <?php endforeach; ?>
            </table>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php } ?>
</div>