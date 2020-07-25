<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-plus"></i>
        Form Tambah Data KRS
    </div>
    <form action="<?php echo base_url ('administrator/krs/tambah_krs_aksi')?>" method="post">
        <div class="form-group">
            <label>Tahun Akademik</label>
            <input type="hidden" name="id_krs" class="form-control" value="<?php echo $id_krs ?>">
            <input type="hidden" name="id_thn_akad" class="form-control" value="<?php echo $id_thn_akad ?>">
            <input type="text" name="thn_akad_smt" class="form-control" value="<?php echo $thn_akad_smt. '/' . $semester; ?>" readonly>
        </div>
        <div class="form-group">
            <label>NIM Mahasiswa</label>
            <input type="text" name="nim" class="form-control" value="<?php echo $nim ?>" readonly>
        </div>
        <div class="form-group">
            <label>Matakuliah</label>
            <?php 
                $query = $this->db->query("SELECT kode_matakuliah, nama_matakuliah FROM matakuliah");

                $dropdowns = $query->result();

                foreach($dropdowns as $dropdown){
                    $dropdownList[$dropdown->kode_matakuliah] = $dropdown->nama_matakuliah;
                }

                echo form_dropdown('kode_matakuliah',$dropdownList,$kode_matakuliah,'class="form-control" id="kode_matakuliah"');
            ?>
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        <?php echo anchor('administrator/krs/krs_aksi','<div class="btn btn-danger btn-sm">< Kembali</div>') ?>
    </form>
</div>