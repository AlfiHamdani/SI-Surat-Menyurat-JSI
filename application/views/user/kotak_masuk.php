      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kotak Masuk <small>Surat Masuk</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-envelope"></i> Kotak Masuk</a></li>
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
                        <th>Tgl Surat</th>
                        <th>Asal Surat</th>
                        <th>Perihal</th>
                        <th>Tanggal Disposisi</th>
                        <th>Isi Disposisi</th>
                        <th>Tindak Lanjut</th>
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
                        <td><?php echo $lihat->tgl_surat ?></td> 
                        <td><?php echo ucwords($lihat->asal_surat) ?></td> 
                        <td><?php echo ucfirst($lihat->perihal) ?></td>
                        <td><?php echo ucfirst($lihat->tgl_disposisi) ?></td>
                        <td><?php echo ucfirst($lihat->isi_disposisi) ?></td>
                        <td><?php echo ucfirst($lihat->tindak_lanjut) ?></td> 
                        <td><?php echo ucfirst($lihat->file_surat) ?></td>  
                        <td align="center">
                          <div class="btn btn-default btn-sm" role="group">
                              <a href="<?php echo base_url(); ?>c_user/lihat/<?php echo $lihat->file_surat ?>"><span class="glyphicon glyphicon-download-alt"></span>Unduh</a>                        
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
