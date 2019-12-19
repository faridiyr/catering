<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-12 mb-4 ml-auto mr-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
            </div>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <?= form_open_multipart('member/tambah_produk'); ?>
                    <!-- <form action="<?= base_url('member/tambah_produk') ?>" method="POST"> -->
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk..." value="<?= set_value('name'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Produk...">
                            <?= form_error('harga', '<small class="text-danger" >', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Produk..." rows="3" value="<?= set_value('deskripsi'); ?>" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Foto Produk</div>
                        <div class="col-sm-8">
                            <div class="row">
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
                        <input type="hidden" id='id' name="id" value=" <?= $user['id']; ?> ">
                        <button type="submit" class="btn btn-primary">Tambahkan Produk</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>