<div class="container-fluid">
    <div class="alert alert-success" role="alert"><i class="fas fa-university"></i>
        Form Halaman Masuk Input Nilai
    </div>
    <form action="<?php echo base_url('administrator/khs/input_nilai_aksi')?>" method="post">
        <div class="form-group">
            <label>Tahun Akademik (Semester)</label>
            <?php 
                $query = $this->db->query('SELECT id_thn_akad, semester, CONCAT(tahun_akademik,"/") AS ta_semester FROM tahun_akademik');

                $dropdowns = $query->result();

                foreach($dropdowns as $dropdown)
                {
                    if($dropdown->semester == 'Ganjil')
                    {
                        $tampilSemester = 'Ganjil';
                    }
                    else
                    {
                        $tampilSemester = 'Genap';
                    }

                    $dropdownList[$dropdown->id_thn_akad] = $dropdown->ta_semester." ".$tampilSemester;
                }
                echo form_dropdown('id_thn_akad', $dropdownList,'','class="form-control"');
            ?>
        </div>

        <div class="form-group">
            <label>Kode Matakuliah</label>
            <input type="text" name="kode_matakuliah" class="form-control" placeholder="Masukkan Kode Matakuliah">
        </div>

        <button type="submit" class="btn btn-primary">Proses</button>
    </form>
</div>