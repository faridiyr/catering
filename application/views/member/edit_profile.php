<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-12 mb-4 ml-auto mr-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <?= form_open_multipart('member/edit_profile'); ?>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Gambar Profile</div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/avatar/') . $user['image']; ?>" class="img-thumbnail">
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
                            <a href="<?= base_url('member/profile'); ?>">
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