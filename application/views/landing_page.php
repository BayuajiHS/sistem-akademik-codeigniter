<nav class="navbar navbar-light bg-warning text-dark">
  <?php foreach($identitas as $idnt) : ?>
  <a class="navbar-brand"><strong><?php echo $idnt->nama_website; ?></strong></a>
  <span class="small"><?php echo $idnt->alamat ?> - <?php echo $idnt->email ?> - <?php echo $idnt->telepon ?></span>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    <?php echo anchor('administrator/auth','<div class="btn btn-outline-primary my-2 my-sm-0 ml-2">Login</div>')?>
  </form>
  <?php endforeach; ?>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mx-auto">
      <a class="nav-item nav-link ml-3" href="#">BERANDA<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link ml-3" href="#">TENTANG KAMPUS</a>
      <a class="nav-item nav-link ml-3" href="#">INFORMASI KAMPUS</a>
      <a class="nav-item nav-link ml-3" href="#">GALERI</a>
      <a class="nav-item nav-link ml-3" href="#">FASILITAS</a>
      <a class="nav-item nav-link ml-3" href="#">KONTAK</a>
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/slider/slider1.jpg')?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/slider/slider2.jpg')?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




<div class="card text-center m-5">
  <div class="card-header">
    <strong>TENTANG KAMPUS</strong>
  </div>
  <div class="card-body">
    <p class="card-text">
      <?php foreach($tentang as $tg) : ?>
      <?php echo word_limiter($tg->sejarah,75) ?><br><br>
      <?php endforeach; ?>
    </p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Baca Selengkapnya
    </button>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tentang Kampus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <strong>SEJARAH KAMPUS</strong><br><br>
        <?php foreach($tentang as $tg) : ?>
        <?php echo $tg->sejarah ?>
        <?php endforeach; ?><br><br><hr>
        <strong>VISI</strong><br><br>
        <?php foreach($tentang as $tg) : ?>
        <?php echo $tg->visi ?>
        <?php endforeach; ?><br><br><hr>
        <strong>MISI</strong><br><br>
        <?php foreach($tentang as $tg) : ?>
        <?php echo $tg->misi ?>
        <?php endforeach; ?><br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>