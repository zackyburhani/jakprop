  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        Halaman Data Fasilitas
      </h4>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('admin/fasilitas')?>">Fasilitas</a></li>
      </ol>
    </section>

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

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <button class="btn btn-success" data-toggle="modal" href="#" data-target="#ModalFasilitas"><i class="fa fa-plus"></i> Tambah Data Fasilitas</button>
            </div>
            <div class="panel-body">  
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                  <tr>
                    <th width="25px"><center>No. </center></th>
                    <th><center>Nama Fasilitas</center></th>
                    <th> <center>Action</center> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach($getAll as $data){ ?>
                    <tr>
                      <td><center><?php echo $no++."."; ?></center></td>
                      <td><center><?php echo $data->nm_fasilitas; ?></center></td>
                      <td><center><button class="btn btn-warning" data-toggle="modal" data-target="#ModalEditFasilitas<?php echo $data->kd_fasilitas ?>"><i class="fa fa-edit"></i> Ubah</button>
                      <button onclick="validate(this)" value="<?php echo $data->kd_fasilitas ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></center></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal Entry Fasilitas -->
<div class="modal fade" id="ModalFasilitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-star-o"></i> Tambah Data Fasiltas</h4>
      </div>
      <form method="POST" action="<?php echo site_url('Controller_Admin/simpanFasilitas')?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group"><label>Nama Fasilitas</label>
            <input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="nm_fasilitas">
          </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Update Fasilitas -->
<?php foreach($getAll as $key) { ?>
<div class="modal fade" id="ModalEditFasilitas<?php echo $key->kd_fasilitas ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-star-o"></i> Ubah Data Fasiltas</h4>
      </div>
      <form method="POST" action="<?php echo site_url('Controller_Admin/ubahFasilitas')?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group"><label>Nama Fasilitas</label>
            <input required class="form-control required text-capitalize" value="<?php echo $key->nm_fasilitas ?>" data-placement="top" data-trigger="manual" type="text" name="nm_fasilitas">
          </div>

          <input required class="form-control required text-capitalize" value="<?php echo $key->kd_fasilitas ?>" data-placement="top" data-trigger="manual" type="hidden" name="kd_fasilitas">
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>

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
            $(location).attr('href','<?php echo base_url('admin/hapus_fasilitas/')?>'+id);
        }
    );
}
 </script>