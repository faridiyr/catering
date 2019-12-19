<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-12 mb-4 ml-auto mr-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Profile</h1>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/avatar/') . $user['image']; ?>" class="rounded" style="width:200px; height:200px;">
                    </div>
                </div>
                <div class="col">
                    <div class="text-align-center">
                        <div class="d-flex align-content-end flex-wrap">
                            <table>
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
                                    <td>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="text-center">
                                            <a href="edit_profile.php">
                                                <form action="<?= base_url('member/edit_profile'); ?>" method="POST">
                                                    <input type="hidden" name="edit_profile" value=" <?= $user['id']; ?> ">
                                                    <button type="submit" name="edit_profile_btn" class="btn btn-warning"><i class="fas fa-user-edit"></i> Edit</button>
                                                </form>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <br>
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
                            <a class="nav-link" href="<?= base_url('member/profile3') ?>">Tambah Produk</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body" id="1">
                    <h5 class="card-title">Produk Anda</h5>
                    <p class="card-text">Belum Ada Produk</p>
                </div>
            </div>
        </div>
    </div>
</div>