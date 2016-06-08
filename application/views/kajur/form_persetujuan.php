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
	<section class="content-header">
      <h1>
        Persetujuan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-envelope"></i> Persetujuan</a></li>
      </ol>
    </section>
	<?php echo form_open('c_kajur/proses_persetujuan'); ?>
	<?php
	 	$id = $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6);
		$data = $this->db->get_where('surat_keluar', array('id_suke' => $id))->result();
		foreach ($data as $lihat):
	?>
	<section class="content"><div class="box box-info">
		<table width="400px"  align="center">
			<tr>
				<td width="80px">
					<label class="control-label" style="text-align:center">No Surat</label>
					</td><td>
						<input type="text" name="no_surat" id="no_surat" class="span1" value="<?php echo $lihat->no_surat;?>" style="color:red"></input>
						<h8 style="color:red">*</h8></td>
				</td>
			</tr>
			<tr>
				<td>
					<label class="control-label" style="text-align:center">Aksi</label>
				</td>
				<td>
					<input type="radio" name="status" id="status" value=0 > Setuju<br/>
					<input type="radio" name="status" id="status" value=1 > Tidak Setuju<br/>
				</td>
			</tr>
			 <tr>
			<td><br></td>
			<td>
				<button type="submit" class="btn btn-success btn-small" onclick="return confirm('Anda Yakin Ingin Menyetujui Surat Ini ?');" >Submit</button>
				<a href="<?php echo base_url();?>c_kajur/permohonan" class="btn btn-warning btn-small">Tutup</a>
			</td>
			</tr>
		</table></div>
	</section>
	<?php endforeach; ?>
	NB: <h8 style="color:red">*</h8> (Data Tidak Boleh Di Ubah)
	<?php echo form_close(); ?>
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