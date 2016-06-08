      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Surat Keluar
          </h1>
          <div class="row">
          <div class="col-md-12">
              <div class="box box-success">
                  <div class="box-header with-border">
                      <h3 class="box-title">Arsip</h3>
                      <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="row">           
                            <div class="col-xs-12">
                              <div class="box box-info">
                                <div class="box-header">
                                </div>
                                <div class="box-body table-responsive no-padding">               
                                  <table id="example1" class="table table-bordered table-hover dataTable">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jenis Surat</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                      <?php  
                                        $no = 1;
                                        foreach ($data as $lihat):
                                      ?>
                                      <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $lihat->nim ?></td> 
                                        <td><?php echo ucwords($lihat->nama) ?></td> 
                                        <td><?php echo ucfirst($lihat->nama_jenis) ?></td> 
                                        <td><?php echo ucfirst($lihat->no_surat) ?></td> 
                                        <td><?php echo $lihat->tgl_surat ?></td>   
                                        <td align="center">
                                          <div class="btn-group" role="group">
                                            <div class="btn-group" role="group">
                                              <button type="button" class="btn btn-default btn-sm">
                                                <a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-print"></span> Print</a>
                                              </button>                           
                                            </div>
                                            <a href="<?php echo base_url(); ?>c_admin/template_surat/<?php echo $lihat->id_suke ?>" class="btn btn-sm btn-primary btn-flat"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
                                          </div>
                                        </td>                     
                                      </tr>
                                      <?php endforeach ?>
                                    </tbody>
                                  </table>                
                                </div><!-- /.box-body -->
                              </div>
                            </div>
                          </div>
                      </div><!-- /.col -->                           
                    </div><!-- /.row -->
                  </div><!-- ./box-body -->
              </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->         
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-envelope"></i> Surat Keluar</a></li>
            <li class="active">Arsip</li>
          </ol>
        </section>
        <!-- Main content -->
      </div>
