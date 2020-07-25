<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fa fa-university"></i> 
        Form Masuk Halaman KRS
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <form action="<?php echo base_url('administrator/krs/krs_aksi')?>" method="post">
        <div class="form-group">
            <label>NIM Mahasiswa</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM...">
            <?php echo form_error('nim','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label for="">Tahun Akademik / Semester</label>
            <?php 
                $query = $this->db->query("SELECT id_thn_akad, semester, CONCAT(tahun_akademik,'/') AS thn_semester FROM tahun_akademik WHERE status='Aktif'");

                $dropdowns = $query->result();

                foreach($dropdowns as $dropdown){
                    
                    if($dropdown->semester == 'Ganjil')
                    {
                        $tampilSemester = 'Ganjil';
                    }
                    else
                    {
                        $tampilSemester = 'Genap';
                    }

                    $dropdownList[$dropdown->id_thn_akad] = $dropdown->thn_semester . " " .$tampilSemester; 
                }

                echo form_dropdown('id_thn_akad',$dropdownList,'','class="form-control" id="id_thn_akad"');
            ?>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Proses</button>
        </div>
    </form>
</div>