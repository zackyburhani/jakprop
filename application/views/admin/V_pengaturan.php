  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <?php if ($this->session->flashdata('pesan') == TRUE) { ?>
          <script> 
            setTimeout(function() {
              swal({
                      title: "Data Berhasil Disimpan",
                      type: "success"
                    });
                  }, 200);
          </script>
        <?php } ?>

        <?php if ($this->session->flashdata('pesanGagal') == TRUE) { ?>
           <script> 
            setTimeout(function() {
              swal({
                      title: "Data Tidak Berhasil Disimpan",
                      type: "error"
                    });
                  }, 200);
          </script>
        <?php } ?>

        <?php if ($this->session->flashdata('Tidak  Cocok') == TRUE) { ?>
           <script> 
            setTimeout(function() {
              swal({
                      title: "Password Tidak Sama",
                      type: "error"
                    });
                  }, 200);
          </script>
        <?php } ?>

      <div class="row">
        <div class="col-lg-12">
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-gears"></i> Pengaturan Akun</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('admin/update_akun') ?>">
              <div class="box-body">
                <input type="hidden" name="id" value="<?php echo $akun->id ?>">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $akun->username ?>" class="form-control" id="inputEmail3" placeholder="Username" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ulangi Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="repassword" placeholder="Ulangi Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Lengkap</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $akun->nama_admin ?>" class="form-control text-capitalize" placeholder="Nama Lengkap" name="nama_admin">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="<?php echo $akun->email ?>" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Telepon</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nomor Telepon" name="no_telp" value="<?php echo $akun->no_telp ?>">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <a href="<?php echo site_url('admin/dashboard') ?>" class="btn btn-default btn-block"><i class="fa fa-close"></i> Batal</a>
                      </div>
                      <div class="col-md-6">
                        <button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan Data</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
// $(function(){ TablesDatatables.init(); });
function validate(a)
{
    var id= a.value;
    swal({
            title: "",
            text: "Anda Yakin Ingin menghapus ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes !",
            closeOnConfirm: false }, function()
        {
            $(location).attr('href','<?php echo base_url('admin/hapus_kategori/')?>'+id);
        }
    );
}
 </script>