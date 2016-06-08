      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Arsip
            <small>Surat Keluar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-envelope"></i> Surat Keluar</a></li>
            <li class="active">Arsip</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">           
            <div class="col-xs-12">
              <div class="box">
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
                            <a href="<?php echo base_url(); ?>c_kajur/template_surat/<?php echo $lihat->id_suke ?>" class="btn btn-sm btn-primary btn-flat"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
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
