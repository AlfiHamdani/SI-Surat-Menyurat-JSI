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
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Form Data Edit Akun</h3>
      </div>
      <div class="box-body">
        <!-- form start -->
        <?php echo form_open('c_admin/update_pass'); ?>
        <?php  
        $lihat = $data[0];
        //foreach ($data as $lihat):
        ?>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" name="username" value="<?php echo $lihat->u_name ?>" required/>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
              <input type="text" class="form-control" name="namalengkap" value="<?php echo $lihat->nama ?>" required/>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Password Lama</label>
              <input type="text" class="form-control" name="pass_lama" value="<?php echo $lihat->u_paswd ?>" required/>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Password Baru</label>
              <input type="text" class="form-control" name="pass_baru" placeholder="Password Baru" required/>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Confirmasi Password Baru</label>
              <input type="text" class="form-control" name="konfirmasi_pass" placeholder="Confirmasi Password" required/>
          </div>
          <!-- <input type="hidden" name="id" value="<?php echo $lihat->u_id ?>"> -->
          <a href="<?php echo base_url(); ?>c_admin/manage_akun" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
          <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button><br>
          <tr>
            <td height="46" colspan="3">Cat : Setelah anda mengubah password anda harus mengingat dan menyimpannya dengan baik karena username dan password inilah yang nantinya anda pakai untuk login ke halaman aplikasi ini. </td>
          </tr>
        
        <?php echo form_close(); ?>
      </div><!-- /.box-body -->
    </div>
  </section><!-- /.content -->
</div>