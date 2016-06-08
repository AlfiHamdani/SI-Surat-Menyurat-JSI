<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tambah
              <small>Disposisi Surat</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/jenis_surat">Jenis Surat</a></li>
              <li class="active">Tambah</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Disposisi Surat</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('c_kajur/proses'); ?>
                      <input type="hidden" name="status" id="status" value=1 >
                      <input type="hidden" name="id" class="form-control" value="<?php echo $this->uri->segment(3); ?>">
                  <div class="form-group">
                  <label for="exampleInputEmail1">Tujuan</label>
                  <td><b>
                    <select class="form-control" autofocus tabindex="1" required style="width: 300px" <?php echo form_input('tujuan'); ?> >
                      <option>--- Pilih Tujuan ---</option>
                        <?php  
                          $user = $this->db->query("SELECT * FROM user WHERE role='user'")->result();
                          foreach ($user as $l_surat) {
                            echo "<option> Pilih Tujuan</option> ";
                            echo "<option  value='$l_surat->u_id'>".ucwords($l_surat->nama)."</option>"; 
                          }
                        ?>
                    </select>
                  </b></td>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Disposisi</label>
                      <input style="width: 300px" type="text" name="tgl" id="tgl_surat" class="form-control" data-date-format="yyyy-mm-dd"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Isi Disposisi</label>
                      <input type="text" name="isi" class="form-control" style="width: 400px; height: 90px" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tindak Lanjut</label>
                      <input type="text" name="tindak" class="form-control" required/>
                  </div>
                  <a href="<?php echo base_url(); ?>c_kajur/surat_baru" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="glyphicon glyphicon-send"></i>  Send</button>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>
         <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    
        <script>
          $(function() {
              $( "#tgl_surat" ).datepicker({ 
                autoclose: true 
              });
            });
        </script>
        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- datepicker -->