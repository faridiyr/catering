<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-12 mb-4 ml-auto mr-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
            </div>
        </div>

        <div class="container-fluid">
            <!-- <div class="col-lg-12"> -->
            <?= $this->session->flashdata('message'); ?>
            <!-- </div> -->
            <div class="row">
                <div class="col-lg-6">
                    <form action="<?= base_url('member/change_password'); ?>" method="post">
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <?= form_error('current_password', '<small class="text-danger" >', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password1">New Password</label>
                            <input type="password" class="form-control" id="new_password1" name="new_password1">
                            <?= form_error('new_password1', '<small class="text-danger" >', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password2">Repeat Password</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2">
                            <?= form_error('new_password2', '<small class="text-danger" >', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('member/index'); ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </a>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>