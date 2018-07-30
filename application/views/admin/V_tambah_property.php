  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        Tambah Data Property
      </h4>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('admin/property')?>">Property</a></li>
        <li><a href="<?php echo base_url('admin/tambah_property')?>">Tambah Data Property</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="<?php echo site_url('Controller_Admin/simpanProperty') ?>" method="POST">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Data Property</h3>
              <hr style="margin-bottom: -5px">
            </div>
            <div class="box-body">
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group"><label>Nama Property</label>
                    <input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="nm_property">
                    <input type="hidden" name="kd_property" value="<?php echo $kd_property ?>">
                  </div>

                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control select2" name="kd_kategori" style="width: 100%;">
                      <?php foreach($getAllKategori as $kat){ ?>
                      <option value="<?php echo $kat->kd_kategori ?>"><?php echo $kat->nm_kategori; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group"><label>Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control select2" name="kecamatan" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Kabupaten</label>
                    <select class="form-control select2" name="kabupaten" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control select2" name="provinsi" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                    </select>
                  </div>

                  <div class="form-group"><label>Harga</label>
                    <input required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control required" data-placement="top" data-trigger="manual" type="number" name="harga">
                  </div>

                </div>

                <div class="col-md-6">
                  
                  <div class="form-group"><label>Jenis</label>
                    <input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="jenis">
                  </div>

                  <div class="form-group"><label>Luas Tanah</label>
                    <input required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control required" data-placement="top" data-trigger="manual" type="number" name="luas_tanah">
                  </div>

                  <div class="form-group"><label>Kamar Tidur</label>
                    <input required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control required" data-placement="top" data-trigger="manual" type="number" name="kamar_tidur">
                  </div>

                  <div class="form-group"><label>Kamar Mandi</label>
                    <input required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control required" data-placement="top" data-trigger="manual" type="number" name="kamar_mandi">
                  </div>

                  <div class="form-group"><label>Angsuran</label>
                    <input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="angsuran">
                  </div>  

                  <?php $q=1; ?>
                  <div class="form-group">
                    <label>Fasilitas</label>
                    <select class="form-control select2" id="my_select2" multiple="multiple" name="kd_fasilitas[]" style="width: 100%;">
                      <?php foreach($getAllFasilitas as $fas){ ?>
                      <option value="<?php echo $fas->kd_fasilitas ?>"><?php echo $fas->nm_fasilitas; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group"><label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                  </div>
                </div>

              </div>
            </div>
            <div class="box-footer" style="margin-bottom: 100px">
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <a href="<?php echo site_url('admin/property') ?>" class="btn btn-default btn-block"><i class="fa fa-close"></i> Batal</a>
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-success btn-block"><i class="fa fa-save"></i> Simpan Data</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>

    </section>
  </div>