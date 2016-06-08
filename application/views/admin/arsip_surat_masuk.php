      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Surat Masuk
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
                                          <a href="<?php echo base_url(); ?>c_admin/edit_surat_masuk/<?php echo $lihat->id_suma ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                                          <a href="<?php echo base_url(); ?>c_admin/hapus_surat_masuk/<?php echo $lihat->id_suma ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                      </td>                     
                                    </tr>
                                    <?php endforeach ?>
                                  </tbody>
                                </table>                
                              </div><!-- /.box-body -->
                  </div></div></div></div></div></div>
                </div>
             </div>
          </div>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-envelope"></i> Surat Masuk</a></li>
            <li class="active">Arsip</li>
          </ol>
        </section>
      </div>
