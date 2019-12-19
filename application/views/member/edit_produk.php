<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-12 mb-4 ml-auto mr-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Produk</h1>
            </div>
        </div>
        <div class="container">
            <!-- <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div> -->
            <div class="row">
                <div class="col-lg-10">
                    <?= form_open_multipart('member/edit_produk/' . $produk['id_produk']); ?>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $produk['id_produk'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $produk['nama_produk'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $produk['harga'] ?>" required>
                            <?= form_error('harga', '<small class="text-danger" >', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" rows="3" value="<?= $produk['deskripsi'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Foto Produk</div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/produk/') . $produk['gambar']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="Image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('member/profile2'); ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>