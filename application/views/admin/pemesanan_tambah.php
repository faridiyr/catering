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
			<li class="breadcrumb-item active">Tambah Pemesanan</li>
		</ol>

		<div class="container">
			<div class="col-lg-12">
				<?= $this->session->flashdata('message'); ?>
			</div>
			<div class="row">
				<div class="col-lg-10">
					<?= form_open_multipart('admin/addPemesanan'); ?>
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
						<input type="text" id="jumlah" name="jumlah" class="form-control col-md-4" minlength="1" maxlength="4" pattern="\d*" required>
						<?= form_error('jumlah', '<small class="text-danger" >', '</small>'); ?>
					</div>

					<a href="<?= base_url('admin/pemesanan'); ?>" class="btn btn-danger">Batal</a>
					<button type="submit" name="submit" value="tambah" class="btn btn-success">Simpan</button>

					</form>
					<br>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->