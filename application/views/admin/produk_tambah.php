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
			<li class="breadcrumb-item active">Tambah Produk</li>
		</ol>

		<div class="container">
			<!-- <div class="col-lg-12"> -->
			<?= $this->session->flashdata('message'); ?>
			<!-- </div> -->
			<div class="row">
				<div class="col-lg-10">
					<?= form_open_multipart('admin/addProduk'); ?>
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" id="nama_produk" name="nama_produk" class="form-control col-md-4" value="<?= set_value('nama_produk'); ?>" required>
					</div>
					<div class="form-group">
						<label>Nama Penjual</label>
						<select name="id_penjual" class="form-control col-md-4" required>
							<!-- <option value="none">--Pilih Penjual--</option> -->
							<?php
							foreach ($nama_penjual as $row) {
								?>
								<option value="<?php echo $row['id']; ?> "><?php echo $row['name']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" id="harga" name="harga" class="form-control col-md-4" required>
						<?= form_error('harga', '<small class="text-danger" >', '</small>'); ?>
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<input type="text" id="deskripsi" name="deskripsi" class="form-control col-md-4" value="<?= set_value('deskripsi'); ?>" required>
					</div>

					<div class="form-group">
						<label>Gambar</label>
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-7">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="Image" name="image" required>
										<label class="custom-file-label" for="image">Choose file</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<button type="submit" name="submit" value="tambah" class="btn btn-primary">Simpan</button>
					<a href="<?= base_url('admin/produk'); ?>" class="btn btn-danger">Batal</a>

					</form>
					<br>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->