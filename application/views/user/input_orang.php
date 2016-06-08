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
            <li class="treeview">
                <a href="#">
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
        <!-- $x = Main content -->
        <section class="content">
          <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Masukkan NIM dan Nama Mahasiswa</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php 
                echo form_open_multipart('c_user/proses_input_orang'); 
                $arrNoSurat = explode("-", $id_surat);
                $no_surat = $arrNoSurat[0]."/".$arrNoSurat[1]."/".$arrNoSurat[2]."/".$arrNoSurat[3];
                //echo "$no_surat";
                ?>
                <div>
                  <?php 
                    $konek = mysqli_connect("localhost","root","root","tb_rpl");
                    $query = "select * from surat_orang where id_surat ='".$no_surat."'";
                    $x = mysqli_query($konek, $query);
                  ?>  
                </div> 
                <div class="row-fluid well" style="overflow: hidden"> 
                  <div class="col-lg-6">
                    <table  class="table-form">
                      <tr><td width="20%">No Surat</td><td><b><input type="text" name="no" tabindex="1" style="width: 400px" class="form-control" value="<?php echo "$no_surat" ?>" disabled/></b></td></tr>
                      <tr><td width="20%">NIM / NIP*</td><td><b><input type="text" id="nim" name="nim" tabindex="2" style="width: 400px" class="form-control" required/></b></td></tr> 
                      <tr><td width="20%">Nama*</td><td><b><input type="text" id="nama" name="nama" tabindex="1" style="width: 400px" class="form-control" required/></b></td></tr>    
                      <tr><td width="20%"></td><td><b><input type="hidden" name="id_surat" tabindex="2" style="width: 400px" class="form-control" value="<?php echo "$no_surat"; ?>" /></b></td></tr>    
                      <tr><td width="20%"></td><td><b><input type="hidden" name="url_surat" tabindex="2" style="width: 400px" class="form-control" value="<?php echo "$id_surat"; ?>" /></b></td></tr>                       
                      <tr><td colspan="2"></td></tr>
                    </table>
                  </div>
                </div>
                <div class="form-group">
                  <td><a href="<?php echo base_url(); ?>c_admin/surat_baru" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a></td>
                  <td><?php echo form_submit('submit', 'Tambah', 'class="btn btn-primary"'); ?></td>
                </div>
                <?php echo form_close(); ?>    
                <?php
                  echo form_open('c_user/');
                ?>     
                <div>
                  <td><?php echo form_submit('submit', 'Selesai', 'class="btn btn-primary"'); ?></td>
                </div>
                <?php echo form_close(); ?>  
              </div><!-- /.box-body -->
          </div><!-- /.box -->
          <div class="box box-info">
          <div class="box-body table-responsive no-padding">               
            <table id="example1" class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIM</th>
              <tbody>
                <?php  
                  $no = 1;
                  $konek = mysqli_connect("localhost","root","root","tb_rpl");
                  $query = "select * from surat_orang where id_surat ='".$no_surat."'";
                  $x = mysqli_query($konek, $query);
                  while($row = mysqli_fetch_array($x))
                  {
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td><?php echo $row['nim'] ?></td>                      
                </tr>
                <?php } ?>            
              </tbody>
            </table>                
          </div>
          </div>
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
    <?php $aaaa=$this->db->query('SELECT nama, nim FROM user')->result_array(); print_r($aaaa); ?>
    <script>
    var nim=document.getElementById('nim');
      nim.onkeyup =function(){
        var user = <?php echo json_encode($aaaa); ?>;
        for(i=0;i<user.length;i++){
          console.log(user[i].nim);
          if(this.value==user[i].nim){
            document.getElementById('nama').value=user[i].nama;
            console.log("ketemu");
            break;
          }
          else{
            document.getElementById('nama').value="";
          }
        }
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

      }
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
