  <div class="container mt-4 mb-4">
      <div class="row">
          <div class="col-lg-12 mb-4 ml-auto mr-auto">
              <div class="bd-example">
                  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                          <div class="carousel-item active">
                              <img src="<?= base_url('assets/img/produk/catering1.jpg'); ?> " class="d-block w-100 rounded" alt="...">
                              <div class="carousel-caption d-none d-md-block">
                                  <h5>CATERING-IN</h5>
                                  <p>Solusi untuk anda yang punya acara</p>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <img src="<?= base_url('assets/img/produk/catering2.jpg'); ?> " class="d-block w-100 rounded" alt="...">
                              <div class="carousel-caption d-none d-md-block">
                                  <h5>CATERING-IN</h5>
                                  <p>Anti pusing-pusing club buat mikirin konsumsi.</p>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <img src="<?= base_url('assets/img/produk/catering3.jpg'); ?> " class="d-block w-100 rounded" alt="...">
                              <div class="carousel-caption d-none d-md-block">
                                  <h5>CATERING-IN</h5>
                                  <p>Sahabat terbaik anda.</p>
                              </div>
                          </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <?php foreach ($produk as $row) { ?>
              <div class="col-xl-4 col-sm-12 mb-3">
                  <div class="card category shadow-sm pull-right">
                      <img class="card-img-top" src="<?= base_url('assets/img/produk/' . $row['gambar']); ?> " height="225px" alt="Card image cap">
                      <div class="card-body">
                          <h5 class="card-title"><?= $row['nama_produk']; ?></h5>
                          <h6>Rp<?= $row['harga']; ?>,-/pcs</h6>
                          <p class="card-text"><?= $row['alamat']; ?></p>
                      </div>
                      <div class="card-footer bg-transparent border-0">
                          <a href="<?= base_url() ?>produk/detail/<?= $row['id_produk']; ?>" class="btn btn-outline-primary">Detail</a>
                      </div>
                  </div>
              </div>
          <?php } ?>
      </div>
  </div>