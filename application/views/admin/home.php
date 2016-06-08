<!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control Panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">  
                    <!-- Small boxes (Stat box) -->           
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <h3><?php echo $surat_keluar ?></h3>
                              <p>Surat Keluar</p>
                            </div>
                            <div class="icon">
                              <i class="glyphicon glyphicon-envelope"></i>
                            </div>
                            <a href="<?php echo site_url('c_admin/arsip_surat_keluar'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div><!-- ./col -->
                      
                        <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <h3><?php echo $surat_masuk; ?></h3>
                              <p>Surat Masuk</p>
                            </div>
                            <div class="icon">
                              <i class="glyphicon glyphicon-envelope"></i>
                            </div>
                            <a href="<?php echo site_url('c_admin/arsip_surat_masuk'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div><!-- ./col -->
                      </div>              
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->