<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>Jenis Surat</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/jenis_surat_keluar">Jenis Surat</a></li>
              <li class="active">Tambah</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Tambah Jenis Surat</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('c_admin/update_jenis_sk'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Surat</label>
                      <input type="text" class="form-control" name="jenis" value="<?php echo $data->nama_jenis; ?>" />
                  </div>
                  <input type="hidden" name="id" value="<?php echo $data->id_jenis ?>">
                  <a href="<?php echo base_url(); ?>c_admin/jenis_surat_keluar" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>