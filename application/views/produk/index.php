<div class="container mt-4 mb-4">
  <div class="row">
    <div class="col-lg-12 mb-4">
      <h6 class="lead" style="text-align:center;">Selamat datang di CATERING-IN
        <br>Selamat Berbelanja :)
        <hr>
      </h6>
    </div>
  </div>

  <div class="row">
    <?php if (!empty($produk)) {
      foreach ($produk as $row) { ?>
        <div class="col-xl-4 col-sm-12 mb-3">
          <div class="card category shadow-sm pull-right">
            <img class="card-img-top" src="<?= base_url('assets/img/produk/' . $row['gambar']); ?> " height="225px" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?= $row['nama_produk']; ?></h5>
              <h6>Rp<?= $row['harga']; ?>,-/pcs</h6>
              <p class="card-text"><?= $row['deskripsi']; ?></p>
            </div>
            <div class="card-footer bg-transparent border-0">
              <a href="<?= base_url() ?>produk/detail/<?= $row['id_produk']; ?>" class="btn btn-outline-primary">Detail</a>
            </div>
          </div>
        </div>
      <?php }
      } else { ?>
      <p> Maaf, Produk tidak ditemukan...</p>
    <?php } ?>
  </div>

  <!-- modal tambah pemesanan -->


</div>