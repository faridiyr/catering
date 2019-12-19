  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="container-fluid">
  		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="<?= base_url("admin/")?>dashboard">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Profile</li>
		</ol>
		<br><br>
  		<div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="text-center">
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/avatar/') . $admin['image']; ?>" class="rounded" style="width:250px; height:250px;">
                    </div>
                </div>
                <!-- membuat kotak pada informasi pribadi -->

                <div class="col-lg-8">
                    <div class="text-align-center">
                        <div class="d-flex align-content-end flex-wrap">
                            <table class="table">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td> <?= $admin['name']; ?></td>
                                </tr>
                                <tr>
                                    <td>ID Pengguna</td>
                                    <td>:</td>
                                    <td> <?= $admin['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td> <?= $admin['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Bergabung</td>
                                    <td>:</td>
                                    <td> <?= date('d F Y', $admin['date_created']); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="text-center">
                                            <!-- <form action="<?= base_url('admin/edit_profile'); ?>" method="POST">
                                                <input type="hidden" name="edit_profile" value=" <?= $admin['id']; ?> ">
                                                <button type="submit" name="" class="btn btn-warning"><i class="fas fa-user-edit"></i> Edit</button>
                                            </form> -->
											<?= anchor('admin/edit_profile/'.$admin['id'], '<button class="btn btn-warning" data-toggle="modal" data-target="#"><i class="fas fa-user-edit"></i> Edit</button>');  ?>
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

	</div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->

