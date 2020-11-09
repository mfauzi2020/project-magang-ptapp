  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('img/user1.png' . session()->get('foto_user')) ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= session()->get('nama_depan', 'nama_belakang') ?></p>
          <i class="fa fa-circle text-success"></i> <?php if (session()->get('level') == 1) {
                                                      echo '';
                                                    } elseif (session()->get('level') == 2) {
                                                      echo '';
                                                    } else {
                                                      echo 'Member';
                                                    } ?>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php if (session()->get('level') == 1) { ?>
          <li>
            <a href="<?= base_url('menu/menu_admin') ?>"><i class="fa fa-th"></i> <span>Menu Admin 1</span>
            </a>
          </li>
          <li>
            <a href="../widgets.html">
              <i class="fa fa-th"></i> <span>Menu Admin 2</span>
            </a>
          </li>
        <?php } ?>

        <?php if (session()->get('level') == 2) { ?>
          <li>
            <a href="../widgets.html">
              <i class="fa fa-th"></i> <span>Menu User 1</span>
            </a>
            <a href="../widgets.html">
              <i class="fa fa-th"></i> <span>Menu User 2</span>
            </a>
          </li>
        <?php } ?>

        <?php if (session()->get('level') == 3) { ?>
          <li>
            <a href="../widgets.html">
              <i class="fa fa-th"></i> <span>Menu Pelanggan 1</span>
            </a>
          </li>
          <li>
            <a href="../widgets.html">
              <i class="fa fa-th"></i> <span>Menu Pelanggan 2</span>
            </a>
          </li>
        <?php } ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active"><?= $title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">