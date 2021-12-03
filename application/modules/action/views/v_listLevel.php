<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view("../../_partials/head.php") ?>
</head>

<body>
  <?php 
    if ($this->session->flashdata('afterDelete')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Level!!", "success") </script>';
    if ($this->session->flashdata('afterAddLevel')) echo '<script> swal("Berhasil!", "Berhasil Menambah Level!!", "success") </script>';
    if ($this->session->flashdata('afterEditLevel')) echo '<script> swal("Berhasil!", "Berhasil Mengedit Level!!", "success") </script>';
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
                  <h2 class="d-inline"><b>Manajemen Level User</b></h2>
                  <a data-bs-toggle="modal" data-bs-target="#axoax" class="btn btn-primary d-inline" style="float : right;"><i class="fas fa-plus-square"></i> Tambah Level</a>
                  <hr>
                  <table class="table-active text-dark text-center table table-bordered table-hover table-responsive" id="asx">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Level</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i = 1;
                        foreach ($getLvl as $v) {
                          ?>
                            <tr>
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $v->nmLevel ?></td>
                              <td><?php echo $v->ket ?></td>
                              <td>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#aklsj" onclick="clicked(this)" data-id="<?php echo $v->nmLevel . "~" . $v->ket . "~" . $v->idLevel ?>" class="btn btn-primary">Ubah</a> | <a href="<?php echo site_url('action/User/DeleteLevelUser/'.$v->idLevel) ?>" onclick="return confirm('Beneran Mau Hapus?')" class="btn btn-danger">Hapus</a>
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
      <form action="<?php echo site_url('action/User/AddLeveluser') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Tambah level User</h4>
          <hr>
          <div class="form-group">
            <label for="">Nama Level*</label>
            <input class="form-control" type="text" name="nmLevel" min="0" placeholder="Nama..." required/>
          </div>
          <div class="form-group">
            <label for="">Keterangan*</label>
            <textarea name="ketLevel" class="form-control" placeholder="keterangan..." id="" cols="30" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnLogin">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="aklsj" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('action/User/EditLeveluser') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Ubah Data Level User</h4>
          <hr>
          <input type="hidden" id="idLevelEdit" name="idLevelEdit">
          <div class="form-group">
            <label for="">Nama*</label>
            <input class="form-control" type="text" name="namaLevelEdit" id="namaLevelEdit" min="0" placeholder="Nama..." />
          </div>
          <div class="form-group">
            <label for="">Keterangan*</label>
            <textarea name="ketLevelEdit" class="form-control" placeholder="keterangan..." id="ketLevelEdit" cols="30" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnLogin">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function clicked(params) {
   let data = $(params).data('id');
   let split = data.split("~")
   
   $('#namaLevelEdit').val(split[0])
   $('#ketLevelEdit').val(split[1])
   $('#idLevelEdit').val(split[2])
  }

	$(document).ready(function () {
    $('#asx').DataTable();
	});
</script>