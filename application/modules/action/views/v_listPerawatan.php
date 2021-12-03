<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view("../../_partials/head.php") ?>
</head>

<body>
  <?php
    if ($this->session->flashdata('afterAddRawat')) echo '<script> swal("Berhasil!", "Berhasil Menambah Perawatan!!", "success") </script>';
    if ($this->session->flashdata('afterValidasi')) echo '<script> swal("Berhasil!", "Berhasil Mensetujui Perawatan!!", "success") </script>';
    if ($this->session->flashdata('afterEditRawat')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Perawatan!!", "success") </script>';
    if ($this->session->flashdata('afterDelete')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Perawatan!!", "success") </script>';
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
                  <h2 class="d-inline"><b>Manajemen Perawatan</b></h2>
                  <?php
                    if($this->session->userdata('level') == "TEKNISI") {
                      echo '<a data-bs-toggle="modal" data-bs-target="#axoax" class="btn btn-primary d-inline" style="float : right;"><i class="fas fa-plus-square"></i> Tambah Perawatan</a>';
                    }
                  ?>
                  <hr>
                  <table class="table-active text-dark text-center table table-bordered table-hover table-responsive" id="asx">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Perawatan</th>
                        <th>Nama Mesin</th>
                        <th>Keterangan</th>
                        <th>Tgl Perawatan</th>
                        <th>Nama User</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i = 1;
                        foreach ($getRawat as $value) {
                          ?>
                            <tr>
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $value->kodePerawatan ?></td>
                              <td><?php echo $value->nmMesin ?></td>
                              <td><?php echo $value->ket_perawatan ?></td>
                              <td><?php echo $value->tgl_perawatan ?></td>
                              <td><?php echo $value->namaPengguna ?></td>
                              <td>
                                <?php
                                  if($this->session->userdata('level') == "ADMIN") {
                                    if($value->status != 1) {
                                      ?> <a href="<?php echo site_url('action/Perawatan/ValidasiPerawatan/'.$value->idPerawatan) ?>" onclick="return confirm('Beneran Validasi Perawatan?')" class="btn btn-success">Validasi</a> |<?php
                                    } else {
                                      ?> <a href="javascript:void(0)" onclick="click3(this)" data-id="<?php echo $value->idPerawatan . "~" . $value->idMesin . "~" . $value->ket_perawatan ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Ubah</a> |<?php
                                    }
                                  } else {
                                    ?> <a href="javascript:void(0)" onclick="click3(this)" data-id="<?php echo $value->idPerawatan . "~" . $value->idMesin . "~" . $value->ket_perawatan ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Ubah</a> |<?php
                                  }
                                ?>
                                <a href="<?php echo site_url('action/Perawatan/DeletePerawatan/'.$value->idPerawatan) ?>" onclick="return confirm('Beneran Mau Hapus?')" class="btn btn-danger">Hapus</a>
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
      <form action="<?php echo site_url('action/Perawatan/AddPerawatan') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Tambah Perawatan</h4>
          <hr>
          <div class="form-group">
            <label for="">Mesin*</label>
            <select name="idMesinPerawatan" id="" class="form-control">
              <?php
                foreach ($listMesin as $value) {
                  ?> <option value="<?php echo $value->idMesin ?>"><?php echo $value->nmMesin ?></option> <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Keterangan*</label>
            <textarea name="ketPerawatan" class="form-control" id="" cols="30" rows="2" required></textarea>
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
      <form action="<?php echo site_url('action/Perawatan/EditPerawatan') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Ubah Perawatan</h4>
          <hr>
          <input type="hidden" name="idPerawatanEdit" id="idPerawatanEdit">
          <div class="form-group">
            <label for="">Mesin*</label>
            <select name="MesinEdit" id="MesinEdit" class="form-control">
              <?php
                foreach ($listMesin as $value) {
                  ?> <option value="<?php echo $value->idMesin ?>"><?php echo $value->nmMesin ?></option> <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Keterangan*</label>
            <textarea name="KetEdits" id="KetEdits" cols="30" rows="2" class="form-control" required></textarea>
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
  function click3(params) {
    let data = $(params).data('id')
    let split = data.split("~")

    console.log(split)

    $('#idPerawatanEdit').val(split[0])
    $('#MesinEdit').val(split[1])
    $('#KetEdits').val(split[2])
  }

	$(document).ready(function () {
    $('#asx').DataTable();
	});
</script>