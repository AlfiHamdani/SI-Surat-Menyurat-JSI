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
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="index2.html" class="logo">
          <span class="logo-mini"><b>A</b>SM</span>
          <span class="logo-lg"><b>App</b> Surat Menyurat</span>
        </a>
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
                            <a href="<?php echo site_url('dashboard/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
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
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
              <a href="<?php echo site_url('login/proses'); ?>">
                <i class="fa fa-home"></i> <span>Dashboard</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i> Manage Akun</a></li>
                <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Ubah Password</a></li>
              </ul>
            </li>            
            <li class="">
              <a href="<?php echo base_url(); ?>c_admin/jenis_surat">
                <i class="fa fa-tag"></i> <span>Jenis Surat</span>
              </a>
            </li>  
            <li>
              <a href="pages/widgets.html">
                <i class="fa fa-envelope"></i> <span>Surat Masuk</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i> Arsip</a></li>
                <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Surat Baru</a></li>
              </ul>
            </li>         
            <li>
              <a>
                <i class="fa fa-envelope"></i> <span>Surat Keluar</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('c_admin/arsip_surat_keluar'); ?>"><i class="fa fa-circle-o"></i>Arsip</a></li>
                <li><a href="karambia.html"><i class="fa fa-circle-o"></i>Permohonan</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tambah
              <small>Manage Akun</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>c_admin/manage_akun">Manage Akun</a></li>
              <li class="active">Tambah</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
              -->
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Tambah Akun</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo validation_errors(); ?>
                <?php echo form_open('c_admin/insert_akun'); ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input type="text" class="form-control" name="namalengkap" placeholder="Nama Lengkap" value="<?php echo set_value('namalengkap'); ?>">
                  </div>                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIP/NIM</label>
                      <input type="text" class="form-control" name="nim" placeholder="Nim/Nip" value="<?php echo set_value('nim'); ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role</label><?php echo set_value('role'); ?>
                      <select name="keterangan" class="form-control" >
                        <option selected="selected">Pilih</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="kajur">Kajur</option>
                      </select>
                  </div>
                  <br><br>
                  <a href="<?php echo base_url(); ?>c_admin/manage_akun" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>Simpan</button>
                <?php echo form_close(); ?>
                
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>

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