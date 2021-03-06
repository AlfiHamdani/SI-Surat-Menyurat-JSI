      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Arsip
            <small>Surat Masuk</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-envelope"></i> Surat Masuk</a></li>
            <li class="active">Arsip</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">           
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="box-tools">
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">               
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Tgl Surat</th>
                        <th>Jenis Surat</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>File Surat</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php  
                        $no = 1;
                        foreach ($data as $lihat):
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $lihat->no_surat?></td>
                        <td><?php echo $lihat->tgl_surat ?></td> 
                        <td><?php echo ucwords($lihat->jenis_surat) ?></td> 
                        <td><?php echo ucwords($lihat->asal_surat) ?></td> 
                        <td><?php echo ucwords($lihat->tujuan_surat) ?></td> 
                        <td><?php echo ucfirst($lihat->perihal) ?></td> 
                        <td><?php echo ucfirst($lihat->file_surat) ?></td>  
                        <td align="center">
                          <div class="btn-group" role="group">
                            <a href="<?php echo base_url(); ?>c_kajur/lihat/<?php echo $lihat->id_suma ?>" class="btn btn-sm btn-primary btn-flat"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
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
        </section><!-- /.content -->
      </div>
