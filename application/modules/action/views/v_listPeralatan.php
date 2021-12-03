<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view("../../_partials/head.php") ?>
</head>

<body>
  <?php
    if ($this->session->flashdata('afterAddAlat')) echo '<script> swal("Berhasil!", "Berhasil Menambah Peralatan!!", "success") </script>';
    if ($this->session->flashdata('afterEditAlat')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Peralatan!!", "success") </script>';
    if ($this->session->flashdata('afterDelete')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Peralatan!!", "success") </script>';
  ?>
  <div id="app">
    <?php $this->load->view("../../_partials/sidebar.php") ?>
    <div id="main">
      <div class="page-content">
        <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="card shadow-lg">
                <div class="card-body">
                  <h2 class="d-inline"><b>Manajemen Peralatan</b></h2>
                  <a data-bs-toggle="modal" data-bs-target="#axoax" class="btn btn-primary d-inline" style="float : right;"><i class="fas fa-plus-square"></i> Tambah Peralatan</a>
                  <hr>
                  <table class="table-active text-dark text-center table table-bordered table-hover table-responsive" id="asx">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Keterangan</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i = 1;
                        foreach ($getAlat as $value) {
                          ?>
                            <tr>
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $value->nama ?></td>
                              <td><?php echo $value->jumlah ?></td>
                              <td>
                                <?php
                                  if($value->kondisi == "1") {
                                    echo '<a href="javascript:void(0)" class="btn btn-primary">Layak</a>';
                                  } else {
                                    echo '<a href="javascript:void(0)" class="btn btn-danger">Tak Layak</a>';
                                  }
                                ?>
                              </td>
                              <td><?php echo $value->keterangan ?></td>
                              <td><?php echo $value->lokasi ?></td>
                              <td>
                                <a href="javascript:void(0)" onclick="click4(this)" data-id="<?php echo $value->idPeralatan . "~" . $value->nama . "~" . $value->jumlah . "~" . $value->kondisi . "~" . $value->keterangan . "~" . $value->lokasi ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Ubah</a> |
                                <a href="<?php echo site_url('action/Peralatan/DeletePeralatan/'.$value->idPeralatan) ?>" onclick="return confirm('Beneran Mau Hapus?')" class="btn btn-danger">Hapus</a>
                              </td>
                            </tr>
                          <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <?php $this->load->view("../../_partials/js.php") ?>

</body>

</html>

<div class="modal fade" id="axoax" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('action/Peralatan/AddPeralatan') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Tambah Peralatan</h4>
          <hr>
          <div class="form-group">
            <label for="">Nama Alat</label>
            <input type="text" name="nmAlat" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Jumlah</label>
            <input type="number" name="jmlhAlat" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Kondisi</label>
            <select name="kondisiAlat" id="" class="form-control" required>
              <option value="">~ Pilih ~</option>
              <option value="1">Layak</option>
              <option value="0">Tak Layak</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="ketAlat" id="" cols="30" rows="2" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label for="">Lokasi</label>
            <textarea name="lokAlat" id="" cols="30" rows="2" class="form-control" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnLogin">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('action/Peralatan/EditPeralatan') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Ubah Peralatan</h4>
          <hr>
          <input type="hidden" name="idAlatEdit" id="idAlatEdit">
          <div class="form-group">
            <label for="">Nama Alat</label>
            <input type="text" name="nmAlatEdit" id="nmAlatEdit" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Jumlah</label>
            <input type="number" name="jmlhAlatEdit" id="jmlhAlatEdit" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Kondisi</label>
            <select name="kondisiAlatEdit" id="kondisiAlatEdit" class="form-control" required>
              <option value="">~ Pilih ~</option>
              <option value="1">Layak</option>
              <option value="0">Tak Layak</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="ketAlatEdit" id="ketAlatEdit" cols="30" rows="2" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label for="">Lokasi</label>
            <textarea name="lokAlatEdit" id="lokAlatEdit" cols="30" rows="2" class="form-control" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnLogin">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function click4(params) {
    let data = $(params).data('id')
    let split = data.split("~")

    $('#idAlatEdit').val(split[0])
    $('#nmAlatEdit').val(split[1])
    $('#jmlhAlatEdit').val(split[2])
    $('#kondisiAlatEdit').val(split[3])
    $('#ketAlatEdit').val(split[4])
    $('#lokAlatEdit').val(split[5])
  }

	$(document).ready(function () {
    $('#asx').DataTable();
	});
</script>