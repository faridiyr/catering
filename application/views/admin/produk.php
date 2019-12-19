  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Produk</li>
      </ol>
      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table"></i> Tabel Produk</div>
        <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
          <div class="flash-datap" data-flashdatap="<?= $this->session->flashdata('flashp'); ?>"></div>

          <a href="<?= base_url('admin/addProduk'); ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
          <br><br>
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="tabel" width="100%" cellspacing="0">
              <!-- edited table-->
              <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Nama Produk</th>
                  <th>Nama Penjual</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="data">
                <?php
                $no = 1;
                foreach ($row->result() as $key => $data) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <img class="img-thumbnail" src="<?= base_url('assets/img/produk/') . $data->gambar; ?>" style="width:100px; height:100px;">
                    </td>
                    <td><?= $data->nama_produk ?></td>
                    <td><?= $data->nama_penjual ?></td>
                    <td><?= $data->harga ?></td>
                    <td><?= $data->deskripsi ?></td>
                    <td width="150px">
                      <!-- <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i> Edit</button> -->
                      <a href="<?= base_url(); ?>admin/produkEdit/<?= $data->id_produk; ?>" class="btn btn-warning btn-xs float-left"><i class="fas fa-edit"></i> Edit</></a>
                      <a href="<?= base_url(); ?>admin/deleteProduk/<?= $data->id_produk; ?>" class="btn btn-danger btn-xs float-left tombol-hapusp ml-1"> <i class="fas fa-trash-alt"></i> Hapus</a>

                      <!-- <?= anchor('admin/produkEdit/' . $data->id_produk, '<button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#"><i class="fas fa-edit"></i> Edit</button>');  ?> -->
                      <!-- <?= anchor('admin/deleteProduk/' . $data->id_produk, '<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-trash-alt"></i> Hapus</button>');  ?> -->
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