      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Permohonan
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-envelope"></i> Permohonan</a></li>
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
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Surat</th>
                        <th>Nomor Surat</th>
                        <th>Tgl Surat</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                      <?php  
                        $no = 1;
                        foreach ($data as $lihat):
                          if ($lihat->disetujui == 0) 
                          {
                            $lihat->disetujui = "<span class='label label-success'>Disetujui</span>";
                          }
                          else if($lihat->disetujui == 1) 
                          {
                            $lihat->disetujui = "<span class='label label-danger'>Ditolak</span>";
                          }
                          else
                          {
                             $lihat->disetujui = "<span class='label label-warning'>Menunggu Confirmasi</span>";
                          }
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $lihat->nim ?></td> 
                        <td><?php echo $lihat->nama ?></td> 
                        <td><?php echo ucfirst($lihat->nama_jenis) ?></td> 
                        <td><?php echo ucfirst($lihat->no_surat) ?></td> 
                        <td><?php echo $lihat->tgl_surat ?></td> 
                        <td><?php echo $lihat->disetujui ?></td>     
                        <td align="center">
                          <div class="btn-group" role="group">
                            <a href="<?php echo base_url(); ?>c_kajur/template_surat/<?php echo $lihat->id_suke ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-eye"></i> Lihat</a>
                          </div>
                          <div class="btn-group" role="group"> 
                            <a href="<?php echo base_url(); ?>c_kajur/setujui/<?php echo $lihat->no_surat ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Setujui</a>
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
