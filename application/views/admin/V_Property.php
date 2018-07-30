  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        Halaman Data Property
      </h4>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('admin/property')?>">Property</a></li>
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

        <?php if ($this->session->flashdata('proses') == TRUE) { ?>
          <script> 
            setTimeout(function() {
              swal({
                      title: "Data Berhasil Diproses",
                      type: "success"
                    });
                  }, 200);
          </script>
        <?php } ?>

        <?php if ($this->session->flashdata('prosesGagal') == TRUE) { ?>
           <script> 
            setTimeout(function() {
              swal({
                      title: "Data Tidak Berhasil Diproses",
                      type: "error"
                    });
                  }, 200);
          </script>
        <?php } ?>


      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <a href="<?php echo site_url('admin/tambah_property') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Poperty</a>
            </div>
            <div class="panel-body">  
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                  <tr>
                    <th width="25px"><center>No. </center></th>
                    <th><center>Nama Property</center></th>
                    <th width="100px"><center>Proses</center></th>
                    <th width="270"> <center>Action</center> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach($getAll as $data){ ?>
                    <tr>
                      <td><center><?php echo $no++."."; ?></center></td>
                      <td><center><?php echo $data->nm_property; ?></center></td>
                      <?php if($data->status == 0) { ?>
                      <td><center><button onclick="proses(this)" value="<?php echo $data->kd_property ?>" class="btn btn-primary"><i class="fa fa-check"></i> Proses</button></center></td>
                      <?php } else { ?>
                      <td><center>-</center></td>
                      <?php } ?>
                      <td>
                        <center>
                          <button class="btn btn-info" data-toggle="modal" data-target="#ModalInfoProperty<?php echo $data->kd_property ?>"><i class="fa fa-folder-open"></i> Detail</button>
                          <a class="btn btn-warning" href="<?php echo site_url('admin/ubah_property/'.$data->kd_property) ?>"><i class="fa fa-edit"></i> Ubah</a>
                          <button onclick="validate(this)" value="<?php echo $data->kd_property ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                        </center>
                      </td>
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

<!-- Modal Detail Fasilitas -->
<?php foreach($getAll as $key) { ?>
<div class="modal fade" id="ModalInfoProperty<?php echo $key->kd_property ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-home"></i> Detail Property</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <?php $getAll_fetch = $this->Model_CRUD->getJoin($key->kd_property); ?>
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td width="130">Nama Property</td>
                  <td width="20">:</td>
                  <td><?php echo $getAll_fetch->nm_property; ?></td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>:</td>
                  <td><?php echo $getAll_fetch->nm_kategori; ?></td>
                </tr>
                <tr>  
                  <td>Harga</td>
                  <td>:</td>
                  <td>Rp. <?php echo number_format($getAll_fetch->harga,2,',','.') ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td><?php echo $getAll_fetch->alamat; ?></td>
                </tr>
                <tr>
                  <td>Kecamatan</td>
                  <td>:</td>
                  <td><?php echo $getAll_fetch->kecamatan; ?></td>
                </tr>
                <tr>
                  <td>Kabupaten</td>
                  <td>:</td>
                  <td><?php echo $getAll_fetch->kabupaten; ?></td>
                </tr>
                <tr>
                  <td>Provinsi</td>
                  <td>:</td>
                  <td><?php echo $getAll_fetch->provinsi; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <?php $getAll_fetch = $this->Model_CRUD->getJoin($key->kd_property); ?>
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td width="130">Jenis</td>
                  <td width="20">:</td>
                  <td><?php echo $getAll_fetch->jenis; ?></td>
                </tr>
                <tr>
                  <td>Luas Tanah</td>
                  <td>:</td>
                  <td><?php echo $getAll_fetch->luas_tanah; ?></td>
                </tr>
                <tr>  
                  <td>Kamar Tidur</td>
                  <td>:</td>
                  <td>Rp. <?php echo $getAll_fetch->kamar_tidur ?></td>
                </tr>
                <tr>
                  <td>Kamar Mandi</td>
                  <td>:</td>
                  <td><?php echo $getAll_fetch->kamar_mandi; ?></td>
                </tr>
                <tr>
                  <td>Angsuran</td>
                  <td>:</td>
                  <td><?php echo $getAll_fetch->angsuran; ?></td>
                </tr>
                <!-- <tr>
                  <td>Deskripsi</td>
                  <td>:</td>
                  <td><?php echo $getAll_fetch->deskripsi; ?></td>
                </tr> -->
              </tbody>
            </table>
          </div>
        </div>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<script>
function proses(a)
{
    var id= a.value;
    swal({
            title: "",
            text: "Anda Yakin Ingin Memproses Data ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes !",
            closeOnConfirm: false }, function()
        {
            $(location).attr('href','<?php echo base_url('admin/proses_property/')?>'+id);
        }
    );
}
 </script>

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
            $(location).attr('href','<?php echo base_url('admin/hapus_property/')?>'+id);
        }
    );
}
 </script>