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
                                      <a href="<?php echo site_url('c_user/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
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
                <a href="<?php echo base_url(); ?>c_user/index">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Profile</span>
                </a>
                <ul class="treeview-menu">      
                    <li class="">
                        <a href="<?php echo site_url('c_user/ubah_pass'); ?>">
                            <i class="fa fa-circle-o"></i>Ubah Password
                        </a>
                    </li>
                </ul>
            </li>          
            <li class="">
                <a href="<?php echo base_url(''); ?>c_user/kotak_masuk">
                    <i class="fa fa-inbox"></i> <span>Kotak Masuk</span>
                </a>
            </li>  
            <li class="">
                <a href="<?php echo base_url(''); ?>c_user/list_permintaan">
                    <i class="fa fa-files-o"></i>
                    <span>List Permintaan</span>
                    <small class="label pull-right bg-green">new</small>
                </a>               
            </li>
            <li>
                <a href="<?php echo base_url(''); ?>c_user/form_surat">
                    <i class="fa fa-envelope"></i> <span>Form Surat</span> 
                </a>                          
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            FORM SURAT
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-envelope"></i> Form Surat</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Input Surat</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open_multipart('c_user/add'); ?>
                  <div class="row-fluid well" style="overflow: hidden">  
                    <div class="col-lg-6">
                      <table  class="table-form">  
                        <tr>
                          <td width="20%" valign="20" >Jenis Surat*</td>
                            <td><b>
                              <select class="form-control" id="123" autofocus tabindex="1" required style="width: 300px" <?php echo form_input('jenis'); ?> >
                                  <option>--- Pilih Jenis ---</option>
                                  <?php  
                                    $jenis = $this->db->query("SELECT * FROM jenis_suke")->result();
                                    foreach ($jenis as $l_surat) {
                                      echo "<option  value='$l_surat->id_jenis'>".ucwords($l_surat->nama_jenis)."</option>"; 
                                    }
                                  ?>
                              </select>
                            </b></td>
                        </tr> 
                        <tr><td width="30%">Tanggal Surat</td><td><b><input type="text" name="tgl" id="tgl_surat" tabindex="3" data-date-format="yyyy-mm-dd" style="width: 300px" class="form-control" required/></td></tr> 
                        <tr><td width="20%">Keperluan</td><td><b><input name="keperluan" tabindex="4" style="width: 400px" class="form-control" required/></b></td></tr>  
                        <tr><td width="20%">Kepada</td><td><b><input type="text" name="kepada" tabindex="5" style="width: 300px" class="form-control" required/></b></td></tr>
                        <tr><td width="20%">Perihal</td><td><b><input type="text" name="perihal" tabindex="6" style="width: 300px" class="form-control" required/></b></td></tr>
                        <tr><td colspan="2"></td></tr>
                      </table>
                    </div>
                    
                    <div class="col-lg-6">  
                      <table  class="table-form" > 
                      <tr id="tidakilang1" hidden><td width="20%">Tanggal Mulai</td><td><b><input type="text" name="tgl_mulai" id="tgl_surat" tabindex="7" data-date-format="yyyy-mm-dd" style="width: 300px" class="form-control"></td></tr> 
                      <tr id="tidakilang2" hidden><td width="20%">Tanggal Akhir</td><td><b><input type="text" name="tgl_akhir" id="tgl_surat" tabindex="8" data-date-format="yyyy-mm-dd" style="width: 300px" class="form-control" ></td></tr>                      
                      <tr id="tidakilang3" hidden><td width="20%">Tempat</td><td><b><input type="text" name="tempat" tabindex="9" style="width: 300px" class="form-control"></b></td></tr>
                      <tr id="tidakilang4" hidden><td width="20%">Dana Bantuan</td><td><b><input type="text" name="dana" tabindex="6" style="width: 300px" class="form-control"></b></td></tr>
                      <tr id="tidakilang5" hidden><td width="20%">Hari</td><td><b><input type="text" name="hari" tabindex="7" style="width: 300px" class="form-control"></b></td></tr> 
                      <tr id="tidakilang6" hidden><td width="20%">Waktu</td><td><b><input type="text" name="waktu" tabindex="6" style="width: 300px" class="form-control"></b></td></tr>                      
                      </table>  
                    </div>
                  </div>
                  <div class="form-group">
                    <td><a href="<?php echo base_url(); ?>c_admin/surat_baru" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a></td>
                    <td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
                  </div>
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
    <script type="text/javascript">
        $('#123').change(function(){
            if(this.value==1){
              $('#tidakilang1').show();
              $('#tidakilang2').show();
              $('#tidakilang3').show();
              $('#tidakilang4').show();
              $('#tidakilang5').show();
              $('#tidakilang6').show();
              $('#tidakilang1').hide();
              $('#tidakilang2').hide();
              $('#tidakilang3').hide();
              $('#tidakilang4').hide();
              $('#tidakilang5').hide();
              $('#tidakilang6').hide();
            }
            else if(this.value==2){
              $('#tidakilang1').show();
              $('#tidakilang2').show();
              $('#tidakilang3').show();
              $('#tidakilang4').show();
              $('#tidakilang5').show();
              $('#tidakilang6').show();
              $('#tidakilang1').hide();
              $('#tidakilang2').hide();
            }
            else if(this.value==3){
              $('#tidakilang1').show();
              $('#tidakilang2').show();
              $('#tidakilang3').show();
              $('#tidakilang4').show();
              $('#tidakilang5').show();
              $('#tidakilang6').show();
              $('#tidakilang4').hide();
              $('#tidakilang5').hide();
              $('#tidakilang6').hide(); 
            }
          });  
    </script>
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
