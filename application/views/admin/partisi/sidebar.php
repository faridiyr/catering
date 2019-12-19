<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary  position-fixed elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link float-center">
    <img src="<?= base_url('assets/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-bold">Admin Catering-in</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar ">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <a href="<?= base_url('admin/profile') ?>">
        <div class="image">
          <img src="<?= base_url('assets/img/avatar/') . $admin['image']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('admin/profile') ?>" class="d-block"> <?= $admin['name']; ?> </a>
        </div>
      </a>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-header">TABLES</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/user" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>admin/produk" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Produk
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>admin/pemesanan" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Pemesanan
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url() . 'auth/logout'; ?>">Logout</a>
      </div>
    </div>
  </div>
</div>