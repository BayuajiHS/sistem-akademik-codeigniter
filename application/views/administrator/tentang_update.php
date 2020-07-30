<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i>
        Form Edit Tentang Kampus
    </div>
    <?php foreach($tentang as $tg) : ?>
    <form method="post" action="<?php echo base_url('administrator/tentang_kampus/update_aksi') ?>">
        <div class="form-group">
            <label for="">Sejarah</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $tg->id ?>">
            <textarea name="sejarah" cols="30" rows="5" class="form-control"><?php echo $tg->sejarah ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Visi</label>
            <textarea name="visi" cols="30" rows="5" class="form-control"><?php echo $tg->visi ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Misi</label>
            <textarea name="misi" cols="30" rows="5" class="form-control"><?php echo $tg->misi ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
    </form>
    <?php endforeach; ?>
</div>