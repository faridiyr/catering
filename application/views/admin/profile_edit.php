  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
              <li class="breadcrumb-item">
                  <a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                  <a href="<?= base_url("admin/") ?>profile">Profile</a>
              </li>
              <li class="breadcrumb-item active">Edit Profile</li>
          </ol>
          <br>
          <div class="container">
              <div class="row">
                  <div class="col-lg-10">
                      <?= form_open_multipart('admin/edit_profile'); ?>
                      <div class="form-group row">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="email" name="email" value="<?= $admin['email']; ?>" readonly>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" name="name" value="<?= $admin['name']; ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-2">Gambar Profile</div>
                          <div class="col-sm-8">
                              <div class="row">
                                  <div class="col-sm-3">
                                      <img src="<?= base_url('assets/img/avatar/') . $admin['image']; ?>" class="img-thumbnail" style="width:200px; height:200px;">
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
                              <a href="<?= base_url('admin/profile'); ?>">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              </a>
                          </div>
                      </div>
                      </form>
                  </div>
              </div>

          </div>
      </div>
      <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->