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
            <li class="breadcrumb-item active">Tambah User</li>
        </ol>

        <div class="container">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <?= form_open_multipart('admin/addUser'); ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="name" name="name" class="form-control col-md-6" value="<?= set_value('name'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control col-md-6" value="<?= set_value('email'); ?>" required>
                        <?= form_error('email', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <div class=" form-group">
                        <label>Password</label>
                        <input type="password" id="password" name="password" class="form-control col-md-6" required>
                        <?= form_error('password', '<small class="text-danger" >', '</small>'); ?>
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
                        <label>Gambar</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="Image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="submit" value="tambah" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('admin/user'); ?>" class="btn btn-danger">Batal</a>

                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->