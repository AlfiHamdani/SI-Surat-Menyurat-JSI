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
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <h3><?php echo $surat_baru ?></h3>
                              <p>Surat Baru</p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-envelope"></i>
                            </div>
                            <a href="<?php echo base_url(); ?>c_kajur/surat_baru" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-green">
                            <div class="inner">
                              <h3><?php echo $permohonan; ?></h3>
                              <p>Permohonan</p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-envelope"></i>
                            </div>
                            <a href="<?php echo base_url(); ?>c_kajur/permohonan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div><!-- ./col -->
                      </div>              
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->