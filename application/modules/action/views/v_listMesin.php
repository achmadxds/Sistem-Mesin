<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view("../../_partials/head.php") ?>
</head>

<body>
  <?php 
    if ($this->session->flashdata('afterAddMesin')) echo '<script> swal("Berhasil!", "Berhasil Menambah Mesin!!", "success") </script>';
    if ($this->session->flashdata('afterEditMesin')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Mesin!!", "success") </script>';
    if ($this->session->flashdata('afterDelete')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Mesin!!", "success") </script>';
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
                  <h2 class="d-inline"><b>Manajemen Mesin</b></h2>
                  <a data-bs-toggle="modal" data-bs-target="#axoax" class="btn btn-primary d-inline" style="float : right;"><i class="fas fa-plus-square"></i> Tambah Mesin</a>
                  <hr>
                  <table class="table-active text-dark text-center table table-bordered table-hover table-responsive" id="asx">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Mesin</th>
                        <th>Seri Mesin</th>
                        <th>Buatan</th>
                        <th>Tahun Operasi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i = 1;
                        foreach ($getMesin as $v) {
                          ?>
                            <tr>
                              <td><?php echo $i++  ?></td>
                              <td><?php echo $v->nmMesin ?></td>
                              <td><?php echo $v->seriMesin ?></td>
                              <td><?php echo $v->buatan ?></td>
                              <td><?php echo $v->thn_operasi ?></td>
                              <td>
                                <a href="javascript:void(0)" onclick="click1(this)" data-id="<?php echo $v->idMesin . "~" . $v->nmMesin . "~" . $v->seriMesin . "~" . $v->buatan . "~" . $v->thn_operasi ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Ubah</a> | <a href="<?php echo site_url('action/Mesin/DeleteMesin/'.$v->idMesin) ?>" onclick="return confirm('Beneran Mau Hapus?')" class="btn btn-danger">Hapus</a>
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
      <form action="<?php echo site_url('action/Mesin/AddMesin') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Tambah Mesin</h4>
          <hr>
          <div class="form-group">
            <label for="">Nama Mesin*</label>
            <input class="form-control" type="text" name="NmMesinInput" min="0" placeholder="Nama..." required/>
          </div>
          <div class="form-group">
            <label for="">Seri Mesin*</label>
            <input class="form-control" type="text" name="SeriInput" min="0" placeholder="90889..." required/>
          </div>
          <div class="form-group">
            <label for="">Buatan*</label>
            <input class="form-control" type="text" name="BuatanInput" min="0" placeholder="China..." required/>
          </div>
          <div class="form-group">
            <label for="">Tahun Operasi*</label>
            <input class="form-control" name="TahunOperasiInput" type="text" min="0" placeholder="2021..." required/>
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
      <form action="<?php echo site_url('action/Mesin/EditMesin') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Ubah Mesin</h4>
          <hr>
          <input type="hidden" name="idMesinEdit" id="idMesinEdit">
          <div class="form-group">
            <label for="">Nama Mesin*</label>
            <input class="form-control" type="text" name="NmMesinEdit" id="NmMesinEdit" min="0" placeholder="Nama..." required/>
          </div>
          <div class="form-group">
            <label for="">Seri Mesin*</label>
            <input class="form-control" type="text" name="SeriEdit" id="SeriEdit" min="0" placeholder="90889..." required/>
          </div>
          <div class="form-group">
            <label for="">Buatan*</label>
            <input class="form-control" type="text" name="BuatanEdit" id="BuatanEdit" min="0" placeholder="China..." required/>
          </div>
          <div class="form-group">
            <label for="">Tahun Operasi*</label>
            <input class="form-control" name="TahunOperasiEdit" id="TahunOperasiEdit" type="text" min="0" placeholder="2021..." required/>
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
  function click1(params) {
    let data = $(params).data('id')
    let split = data.split("~")

    $('#idMesinEdit').val(split[0])
    $('#NmMesinEdit').val(split[1])
    $('#SeriEdit').val(split[2])
    $('#BuatanEdit').val(split[3])
    $('#TahunOperasiEdit').val(split[4])
  }

	$(document).ready(function () {
    $('#asx').DataTable();
	});
</script>