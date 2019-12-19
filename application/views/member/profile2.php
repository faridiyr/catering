<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-12 mb-4 ml-auto mr-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Profile</h1>
            </div>
        </div>

        <div class="container-fluid">
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="text-center">
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/avatar/') . $user['image']; ?>" class="rounded" style="width:250px; height:250px;">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="text-align-center">
                        <div class="d-flex align-content-end flex-wrap">
                            <table class="table">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $user['name']; ?></td>
                                </tr>
                                <tr>
                                    <td>ID Pengguna</td>
                                    <td>:</td>
                                    <td><?= $user['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $user['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Bergabung</td>
                                    <td>:</td>
                                    <td><?= date('d F Y', $user['date_created']); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="text-center">
                                            <form action="<?= base_url('member/edit_profile'); ?>" method="POST">
                                                <input type="hidden" name="edit_profile" value=" <?= $user['id']; ?> ">
                                                <button type="submit" name="edit_profile_btn" class="btn btn-warning"><i class="fas fa-user-edit"></i> Edit</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const tabel = document.getElementsByClassName("table");
                tabel.style.borderStyle = 'solid';
            </script>


            <br>
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('member/profile') ?>">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('member/profile2') ?>">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('member/profile3') ?>">Pemesanan Masuk</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body" id="1">
                    <h5 class="card-title">Produk Anda</h5>
                    <div class="text-center">
                        <a href="<?= base_url('member/tambah_produk') ?>">
                            <button type="submit" name="edit_profile_btn" class="btn btn-warning"><i class="fas fa-plus-circle"></i> Tambahkan Produk</button>
                        </a>
                    </div>
                    <br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="data">
                            <?php $no = 1;
                            foreach ($produk->result() as $key => $data) { ?>
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= $data->nama_produk ?></td>
                                    <td><?= $data->harga ?></td>
                                    <td><?= $data->deskripsi ?></td>
                                    <td>
                                        <img class="img-thumbnail" src="<?= base_url('assets/img/produk/') . $data->gambar; ?>" class="rounded" style="width:100px; height:100px;">
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <form action="<?= base_url('member/edit_produk/' . $data->id_produk); ?>" method="POST">
                                                <input type="hidden" name="edit_produk" value="<?= $data->id_produk ?>">
                                                <button type="submit" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-edit"></i> Edit</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>