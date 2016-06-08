<!DOCTYPE html>
<html>
    <head>
    <title>App Surat Menyurat | Dashboard</title>
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">

    </head>
    <body class="skin-green">
        <div class="wrapper">
            <header class="main-header">
                <a href="index2.html" class="logo"><b>App </b>Surat Jurusan</a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Assalamu'alaikum, 
                                    <img src="<?php echo base_url('assets/img/avatar5.png'); ?>" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?php echo base_url('assets/img/avatar5.png'); ?>" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $this->session->userdata('nama'); ?> / <?php echo $this->session->userdata('role'); ?>
                                        </p>
                                    </li>
                                    <li class="user-body">
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('c_admin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url('assets/img/avatar5.png'); ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->session->userdata('nama'); ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <!-- <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form> -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="<?php if($page == 'home'){echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>c_admin/index">
                                <i class="fa fa-home"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Master</span><i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if($page == 'manage_akun'){echo 'active';} ?>">
                                    <a href="<?php echo site_url('c_admin/manage_akun'); ?>">
                                        <i class="fa fa-angle-right"></i> Manage Akun
                                    </a>
                                </li>
                                <li class="<?php if($page == 'ubah_pass'){echo 'active';} ?>">
                                    <a href="<?php echo site_url('c_admin/ubah_pass'); ?>">
                                        <i class="fa fa-angle-right"></i> Ubah Password
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="fa fa-tag"></i> <span>Jenis Surat</span><i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if($page == 'jenis_surat_masuk'){echo 'active';} ?>">
                                    <a href="<?php echo site_url('c_admin/jenis_surat_masuk'); ?>">
                                        <i class="fa fa-angle-right"></i> Masuk
                                    </a>
                                </li>
                                <li class="<?php if($page == 'jenis_surat_keluar'){echo 'active';} ?>">
                                    <a href="<?php echo site_url('c_admin/jenis_surat_keluar'); ?>">
                                        <i class="fa fa-angle-right"></i> Keluar
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="pages/widgets.html">
                                <i class="fa fa-envelope"></i> <span>Surat Masuk</span>  <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if($page == 'surat_masuk'){echo 'active';} ?>"><a href="<?php echo site_url('c_admin/arsip_surat_masuk'); ?>"><i class="fa fa-angle-right"></i> Arsip</a></li>
                                <li class="<?php if($page == 'surat_baru'){echo 'active';} ?>"><a href="<?php echo site_url('c_admin/surat_baru'); ?>"><i class="fa fa-angle-right"></i> Surat Baru</a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="pages/widgets.html">
                                <i class="fa fa-envelope"></i> <span>Surat Keluar</span>  <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php if($page == 'surat_keluar'){echo 'active';} ?>"><a href="<?php echo site_url('c_admin/arsip_surat_keluar'); ?>"><i class="fa fa-angle-right"></i>Arsip</a></li>
                                <li class="<?php if($page == 'permohonan'){echo 'active';} ?>"><a href="<?php echo site_url('c_admin/permohonan'); ?>"><i class="fa fa-angle-right"></i>Permohonan</a></li>
                            </ul>
                        </li>
                    </ul>  
                </section>
                <!-- /.sidebar -->
            </aside>
            <?php $this->load->view('admin/'.$page); ?>

            <footer class="main-footer">
          <div class="pull-right hidden-xs">
              <b>Tugas RPL</b>
          </div>
          <strong>Copyright &copy; App Surat Jurusan </strong>
      </footer>
    </div><!-- ./wrapper -->
    <div>
      <table id="example1"></table>
    </div>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $(function () {
        $("#example1").DataTable({          
          "language": {
            "url": "<?php echo base_url(); ?>assets/plugins/datatables/Indonesian.json",
            "sEmptyTable": "Tidak ada data di database"
        }
        });
      });
      $(function() {
          $( "#tgl_surat" ).datepicker({ 
            autoclose: true 
          });
        });
    </script>
    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
  </body>
</html>