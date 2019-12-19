  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User</li>
      </ol>
      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table"></i> Tabel User</div>
        <div class="card-body">
          <!-- <div id="message"> -->
          <?= $this->session->flashdata('message'); ?>
          <div class="flash-datau" data-flashdatau="<?= $this->session->flashdata('flashu'); ?>"></div>

          <!-- </div> -->
          <a href="<?= base_url('admin/addUser'); ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
          <br><br>
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="tabel" width="100%" cellspacing="0">
              <!-- edited table-->
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="data">
                <?php
                $no = 1;
                foreach ($user->result() as $data) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->name ?></td>
                    <td><?= $data->email ?></td>
                    <td><?= $data->level ?></td>
                    <td>
                      <img class="img-thumbnail" src="<?= base_url('assets/img/avatar/') . $data->image; ?>" style="width:100px; height:100px;">
                    </td>
                    <td width="150px">
                      <!-- <a href="#" class="btn btn-warning" data-target=""><i class="fas fa-edit"></i> Edit</a> -->

                      <!-- <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i> Edit</button> -->

                      <!-- <?= anchor('admin/userEdit/' . $data->id, '<button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#"><i class="fas fa-edit"></i> Edit</button>');  ?> -->
                      <!-- <?= anchor('admin/deleteUser/' . $data->id, '<button class="btn btn-danger btn-xs" ><i class="fas fa-trash-alt"></i> Hapus</button>');  ?> -->

                      <a href="<?= base_url(); ?>admin/userEdit/<?= $data->id; ?>" class="btn btn-warning btn-xs float-left"><i class="fas fa-edit"></i> Edit</></a>
                      <a href="<?= base_url(); ?>admin/deleteUser/<?= $data->id; ?>" class="btn btn-danger btn-xs float-left tombol-hapusu ml-1"> <i class="fas fa-trash-alt"></i> Hapus</a>

                    </td>
                  </tr>
                <?php
                } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->

  <!-- modal delete user -->
  <!-- <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin menghapus produk ini?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Silakan klik "YA" jika ingin menghapus produk ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?= base_url(); ?>admin/deleteUser/<?= $data->id; ?>">YA</a>
        </div>
      </div>
    </div>
  </div> -->