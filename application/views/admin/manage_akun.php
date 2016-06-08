<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Akun
      <small>Master</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index"><i class="fa fa-envelope"></i> Master</a></li>
      <li class="active">Arsip</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">  
      <div class="span12">      
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="">
                <?php if($this->session->flashdata('alert')): ?>
                  <div class="alert"><?php echo $this->session->flashdata('alert'); ?></div> 
                <?php endif; ?> 
                <a href="<?php echo base_url(); ?>c_admin/tambah_akun" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
              </h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">               
              <table id="example1" class="table table-bordered table-hover dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>NIM / NIP</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                  <?php  
                    $no = 1;
                    foreach ($data as $lihat):
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $lihat->u_name?></td>
                    <td><?php echo $lihat->nama ?></td> 
                    <td><?php echo $lihat->nim ?></td> 
                    <td><?php echo $lihat->role ?></td> 
                    <td align="center">
                      <div class="btn-group" role="group">
                        <a href="<?php echo base_url(); ?>c_admin/edit_akun/<?php echo $lihat->u_id ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?php echo base_url(); ?>c_admin/hapus_akun/<?php echo $lihat->u_id ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
                      </div>
                    </td>                     
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>                
            </div><!-- /.box-body -->
          </div>
        </div>
      </div>
  </section><!-- /.content -->
</div>