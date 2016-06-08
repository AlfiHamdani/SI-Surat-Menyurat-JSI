      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>Manage Akun</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Master</a></li>
              <li><a href="<?php echo base_url(); ?>c_admin/manage_akun">Manage Akun</a></li>
              <li class="active">Edit</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Edit Akun</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('c_user/proses_ubah_pass',array('id'=>'form_edit')); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $data->u_name ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input type="text" class="form-control" name="namalengkap" value="<?php echo $data->nama ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIP/NIM</label>
                      <input type="text" class="form-control" name="nim" value="<?php echo $data->nim ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password Lama</label>
                      <input type="text" class="form-control" name="lama" placeholder="Password Lama" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password Baru</label>
                      <input type="password" class="form-control" name="baru" placeholder="Password Baru" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Konfirmasi Password Baru</label>
                      <input type="password" class="form-control" name="konfirmasi" placeholder="Konfirmasi" required/>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $data->u_id ?>">
                  <a href="<?php echo base_url(); ?>c_admin/manage_akun" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>
