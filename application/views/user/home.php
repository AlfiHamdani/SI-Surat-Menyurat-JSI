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
                              <h3><?php echo $list_permintaan ?></h3>
                              <p>Permintaan</p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-envelope"></i>
                            </div>
                            <a href="<?php echo base_url(); ?>c_user/list_permintaan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-green">
                            <div class="inner">
                              <h3><?php echo $kotak_masuk; ?></h3>
                              <p>Kotak Masuk</p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-envelope"></i>
                            </div>
                            <a href="<?php echo base_url(); ?>c_user/kotak_masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div><!-- ./col -->
                      </div>              
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->