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
  				<a href="<?= base_url("admin/") ?>produk">Produk</a>
  			</li>
  			<li class="breadcrumb-item active">Edit Produk</li>
  		</ol>
  		<div class="container">
  			<form action="<?= base_url(); ?>admin/produkEdit/<?= $produk['id_produk'] ?>" method="POST" enctype="multipart/form-data">
  				<div class="form-group">
  					<label>ID Produk</label>
  					<input type="text" name="id_produk" value="<?php echo $produk['id_produk'] ?>" class="form-control" readonly>
  				</div>

  				<div class="form-group">
  					<label>Nama Produk</label>
  					<input type="text" name="nama_produk" value="<?php echo $produk['nama_produk'] ?>" class="form-control" required>
  				</div>

  				<div class="form-group">
  					<label>Nama Penjual</label>
  					<select name="id_penjual" class="form-control col-md-6" required>
  						<!-- <option value="none">--Pilih Penjual--</option> -->
  						<!-- <?php
								foreach ($nama_penjual as $row) {
									?>
  							<option value="<?php echo $row['id']; ?> "><?php echo $row['name']; ?></option>
  						<?php
							}
							?> -->
  						<?php foreach ($nama_penjual as $np) : ?>
  							<?php if ($np['name'] == $penjual['name']) : ?>
  								<option value="<?= $np['id']; ?>" selected><?= $np['name']; ?></option>
  							<?php else : ?>
  								<option value="<?= $np['id']; ?>"><?= $np['name']; ?></option>
  							<?php endif; ?>
  						<?php endforeach; ?>
  					</select>
  				</div>

  				<div class="form-group">
  					<label>Harga</label>
  					<input type="text" name="harga" value="<?php echo $produk['harga'] ?>" class="form-control" required>
  					<?= form_error('harga', '<small class="text-danger" >', '</small>'); ?>
  				</div>

  				<div class="form-group">
  					<label>Deskripsi</label>
  					<input type="text" name="deskripsi" value="<?php echo $produk['deskripsi'] ?>" class="form-control" required>
  				</div>

  				<div class="form-group">
  					<div class="row">
  						<div class="col-sm-3">
  							<img src="<?= base_url('assets/img/produk/') . $produk['gambar']; ?>" class="img-thumbnail" style="width:200px; height:200px;">
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
  				<a href="<?= base_url('admin/produk'); ?>" class="btn btn-danger">Batal</a>
  			</form>
  			<br>
  		</div>
  		<!-- /.container-fluid -->

  	</div>
  </div>
  <!-- /.content-wrapper -->