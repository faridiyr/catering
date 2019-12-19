<div class="container">
    <div class="row mt-3">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">

            <div class="card mb-4  align-self-center">
                <div class="card-header ">
                    Detail Data Produk
                </div>
                <div class="card-body">
                    <p class="card-img-top ml-auto mr-auto"> <img src="<?= base_url('assets/img/produk/' . $produk['gambar']); ?>" style="max-width:300px;"> </p>
                    <h5 class="card-title"><?= $produk['nama_produk']; ?></h5>
                    <h6>Rp<?= $produk['harga']; ?></h6>
                    <p class="card-text"><?= $produk['deskripsi']; ?></p>
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?= base_url(); ?>produk" class="btn btn-primary"><i class="fa fa-chevron-circle-left mr-1" aria-hidden="true"></i>Kembali</a>
                        </div>
                        <div class="col-lg-8">
                            <form class="form-inline ml-auto " method="post" action="<?= base_url('produk/tambahPemesanan/' . $produk['id_produk']); ?>">
                                <input class="form-control col-md-4 mr-2" type="text" placeholder="Jumlah" name="jumlah" minlength="1" maxlength="4" pattern="\d*" required>
                                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-cart-plus mr-1" aria-hidden="true"></i>Pesan</button>
                            </form>
                        </div>
                    </div>
                    <!-- <a href="<?= base_url(); ?>produk" class="btn btn-primary ml-3"><i class="fa fa-cart-plus mr-1" aria-hidden="true"></i>Pesan</a> -->
                </div>
            </div>

        </div>
    </div>
</div>