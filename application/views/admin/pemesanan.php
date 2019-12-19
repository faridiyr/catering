  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pemesanan</li>
      </ol>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header"><i class="fas fa-table"></i> Tabel Pemesanan</div>
        <div class="card-body">
          <!-- <?= $this->session->flashdata('message'); ?> -->
          <a href="<?= base_url('admin/addPemesanan'); ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
          <br><br>
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="tabel" width="100%" cellspacing="0">
              <!-- edited table-->
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Nama Pembeli</th>
                  <th>Jumlah</th>
                  <th>Total Harga</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Status Pemesanan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="data">
                <?php
                $no = 1;
                foreach ($row->result() as $key => $data) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->nama_produk ?></td>
                    <td><?= $data->nama_pembeli ?></td>
                    <td><?= $data->jumlah ?></td>
                    <td><?= $data->total_harga ?></td>
                    <?php date_default_timezone_set("Asia/Jakarta"); ?>
                    <td><?= date('d-m-Y G:i', $data->tanggal_pemesanan); ?></td>

                    <td><?= $data->status_pemesanan ?></td>
                    <td width="200px">
                      <!-- <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i> Edit</button> -->
                      <!-- <?= anchor('admin/pemesananEdit/' . $data->id_pemesanan, '<button class="btn btn-warning btn-xs " data-toggle="modal" data-target="#"><i class="fas fa-edit"></i> Edit</button>');  ?> -->
                      <!-- <?= anchor('admin/deletePemesanan/' . $data->id_pemesanan, '<button class="btn btn-danger btn-xs tombol-hapus" data-toggle="modal" data-target="#"><i class="fas fa-trash-alt"></i> Hapus</button>');  ?> -->
                      <!-- <?= anchor('admin/selesaiPemesanan/' . $data->id_pemesanan, '<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#"><i class="fas fa-check"></i> Selesai</button>');  ?> -->

                      <a href="<?= base_url(); ?>admin/pemesananEdit/<?= $data->id_pemesanan; ?>" class="btn btn-warning btn-xs float-left"><i class="fas fa-edit"></i> Edit</></a>
                      <a href="<?= base_url(); ?>admin/deletePemesanan/<?= $data->id_pemesanan; ?>" class="btn btn-danger btn-xs float-left tombol-hapus ml-1"><i class="fas fa-trash-alt"></i> Hapus</a>
                      <a href="<?= base_url(); ?>admin/selesaiPemesanan/<?= $data->id_pemesanan; ?>" class="btn btn-primary btn-xs float-left ml-1"><i class="fas fa-check"></i> Selesai</a>
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