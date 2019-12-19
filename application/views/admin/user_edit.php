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
  				<a href="<?= base_url("admin/") ?>user">User</a>
  			</li>
  			<li class="breadcrumb-item active">Edit User</li>
  		</ol>
  		<div class="container">
  			<form action="<?= base_url(); ?>admin/userEdit/<?= $user['id'] ?>" method="POST" enctype="multipart/form-data">
  				<div class="form-group">
  					<label>ID User</label>
  					<input type="text" name="id" value="<?php echo $user['id'] ?>" class="form-control" readonly>
  				</div>

  				<div class="form-group">
  					<label>Nama</label>
  					<input type="text" name="name" value="<?php echo $user['name'] ?>" class="form-control" required>
  				</div>
  				<div class="form-group">
  					<label>Email</label>
  					<input type="email" name="email" value="<?php echo $user['email'] ?>" class="form-control" readonly>
  				</div>
  				<div class="form-group">
  					<label>Level</label>
  					<select name="role_id" class="form-control col-md-6" required>
  						<!-- <option value="none">--Pilih Level--</option> -->
  						<?php
							foreach ($level as $row) {
								?>
  							<option value="<?php echo $row['id']; ?> "><?php echo $row['role']; ?></option>
  						<?php
							}
							?>
  					</select>
  				</div>
  				<div class="form-group">
  					<div class="row">
  						<div class="col-sm-3">
  							<img src="<?= base_url('assets/img/avatar/') . $user['image']; ?>" class="img-thumbnail" style="width:200px; height:200px;">
  						</div>
  						<div class="col-sm-7">
  							<div class="custom-file">
  								<input type="file" class="custom-file-input" id="Image" name="image">
  								<label class="custom-file-label" for="image">Choose file</label>
  							</div>
  						</div>
  					</div>
  				</div>

  				<button type="submit" name="update" class="btn btn-primary">Simpan</button>
  				<a href="<?= base_url('admin/user'); ?>" class="btn btn-danger">Batal</a>
  			</form>
  			<br>
  		</div>
  	</div>
  	<!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->