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
  				<a href="<?= base_url("admin/") ?>pemesanan">Pemesanan</a>
  			</li>
  			<li class="breadcrumb-item active">Edit Pemesanan</li>
  		</ol>
  		<div class="container">
  			<form action="<?= base_url(); ?>admin/pemesananEdit/<?= $pemesanan['id_pemesanan'] ?>" method="POST" enctype="multipart/form-data">
  				<div class="form-group">
  					<label>ID Pemesanan</label>
  					<input type="text" name="id_pemesanan" value="<?php echo $pemesanan['id_pemesanan'] ?>" class="form-control col-md-4" readonly>
  				</div>

  				<div class="form-group">
  					<label>Nama Produk</label>
  					<select name="id_produk" class="form-control col-md-4" required>
  						<!-- <option value="none">--Pilih Produk--</option> -->
  						<?php
							foreach ($nama_produk as $row) {
								?>
  							<option value="<?php echo $row['id_produk']; ?> "><?php echo $row['nama_produk']; ?></option>
  						<?php
							}
							?>
  					</select>
  				</div>

  				<div class="form-group">
  					<label>Nama Pembeli</label>
  					<select name="id_pembeli" class="form-control col-md-4" required>
  						<!-- <option value="none">--Pilih Pembeli--</option> -->
  						<?php
							foreach ($nama_pembeli as $row) {
								?>
  							<option value="<?php echo $row['id']; ?> "><?php echo $row['name']; ?></option>
  						<?php
							}
							?>
  					</select>
  				</div>

  				<div class="form-group">
  					<label>Jumlah</label>
  					<input type="text" name="jumlah" value="<?php echo $pemesanan['jumlah'] ?>" class="form-control col-md-2" required>
  					<?= form_error('jumlah', '<small class="text-danger" >', '</small>'); ?>
  				</div>

  				<a href="<?= base_url('admin/pemesanan'); ?>" class="btn btn-danger">Batal</a>
  				<button type="submit" name="update" class="btn btn-primary">Simpan</button>
  			</form>
  			<br>
  		</div>
  	</div>
  	<!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->