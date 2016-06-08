      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>Surat Baru</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/surat_masuk">Surat Masuk</a></li>
              <li class="active">Edit</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Edit Surat Baru</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('c_admin/update_surat_baru'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Surat</label>
                      <select name="jenis" class="form-control">
                        <?php
                        $l_jenis = $this->db->query("SELECT * FROM tb_jenis_surat")->result();
                        
                        if (empty($l_jenis)) {
                          echo "<option  value=''> --Tidak Ada Data-- </option>";
                        } else {
                        foreach($l_jenis as $l_jenis_surat){
                        ?>
                       <option <?php if( $data->jenis_id == $l_jenis_surat->jenis_id) {echo "selected"; } ?> value='<?php echo $l_jenis_surat->jenis_id ;?>'><?php echo $l_jenis_surat->jenis_surat ;?></option>

                        <?php 
                          } 
                          }
                        ?>
                        
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Surat</label>
                      <input type="text" class="form-control" name="no" value="<?php echo $data->no_surat ?>" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tgl Surat</label>
                      <input type="text" class="form-control" name="tgl" id="tgl_surat" data-date-format="yyyy-mm-dd" value="<?php echo $data->tgl_surat ?>"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Asal Surat</label>
                      <input type="text" class="form-control" name="asal" value="<?php echo $data->asal_surat ?>"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tujuan Surat</label>
                      <input type="text" class="form-control" name="tujuan" value="<?php echo $data->tujuan_surat ?>"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Perihal</label>
                      <input type="text" class="form-control" name="perihal" value="<?php echo $data->perihal ?>"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Upload File</label>
                    <td class="form-control"><?php echo form_upload('berkas'); ?></td>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $data->id_suma ?>">
                  <a href="<?php echo base_url(); ?>c_admin/surat_baru" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>