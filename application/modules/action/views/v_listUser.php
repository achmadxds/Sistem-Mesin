<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view("../../_partials/head.php") ?>
</head>

<body>
  <?php 
    if ($this->session->flashdata('afterDelete')) echo '<script> swal("Berhasil!", "Berhasil Menghapus Pengguna!!", "success") </script>';
    if ($this->session->flashdata('afterAktivasi')) echo '<script> swal("Berhasil!", "Berhasil Aktivasi Pengguna!!", "success") </script>';
    if ($this->session->flashdata('afterUpdate')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Pengguna!!", "success") </script>';
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
                  <a href="<?php echo site_url('absen/Absen/listAbsenUser') ?>">
                    <h1 class="text-center"><b>Manajemen Pengguna</b></h1>
                  </a>
                  <hr>
                  <table class="table-active text-dark text-center table table-bordered table-hover table-responsive" id="asx">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>Jenis Kelamin</th>
                        <th>No Karyawan</th>
                        <th>Level</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i = 1;
                        foreach ($getUser as $v) {
                          ?>
                            <tr>
                              <td><?php echo $i++  ?></td>
                              <td><?php echo $v->namaPengguna ?></td>
                              <td><?php echo $v->username ?></td>
                              <td><?php echo $v->jekel ?></td>
                              <td><?php echo $v->nokaryawan ?></td>
                              <td><?php echo $v->nmLevel ?></td>
                              <td>
                                <?php
                                  if($v->status != 1) {
                                    ?> <a href="<?php echo site_url('action/User/UpdateStatusUser/'.$v->idUser) ?>" onclick="return confirm('Beneran Aktivasi Pengguna?')" class="btn btn-success">Aktivasi</a> <?php
                                  } else {
                                    ?> <a href="javascript:void(0)" data-bs-toggle="modal" data-id="<?php echo $v->idUser . "~" . $v->namaPengguna . "~" . $v->username . "~" .  $v->jekel . "~" .  $v->nokaryawan . "~" .  $v->idLevel. "~" .  $v->idPengguna ?>" data-bs-target="#exampleModal" onclick="click8(this)" class="btn btn-primary">Ubah</a> <?php
                                  }
                                ?>
                                | <a href="<?php echo site_url('action/User/Delete/'.$v->idUser.'/'.$v->idPengguna) ?>" onclick="return confirm('Beneran Mau Hapus?')" class="btn btn-danger">Hapus</a> |
                                <a href="<?php echo site_url('action/User/Delete/'.$v->idUser.'/'.$v->idPengguna) ?>" class="btn btn-warning text-dark">Reset</a> 
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('action/User/Update') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Ubah Data Pengguna</h4>
          <hr>
          <input type="hidden" name="idEdits" id="idEdits">
          <input type="hidden" name="idPEdits" id="idPEdits">
          <div class="form-group">
            <label for="">Nama Pengguna</label>
            <input class="form-control" type="text" name="namaEdits" id="namaEdits"min="0" placeholder="Nama..." />
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input class="form-control" type="text" name="usmEdits" id="usmEdits" min="0" placeholder="Username..." />
          </div>
          <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jklEdits" id="jklEdits" class="form-control">
              <option value="">- PILIH -</option>
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">No Karyawan</label>
            <input class="form-control" type="text" name="nokarEdits" id="nokarEdits" min="0" placeholder="" />
          </div>
          <div class="form-group">
            <label for="">Level</label>
            <select name="lvlEdits" id="lvlEdits" class="form-control">
              <option value="">- PILIH -</option>
              <?php
                foreach ($lvluser as $value) {
                  ?> <option value="<?php echo $value->idLevel ?>"><?php echo $value->nmLevel ?></option> <?php
                }
              ?>
            </select>
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
  function click8(params) {
    let data = $(params).data('id')
    let split = data.split("~")

    $('#idEdits').val(split[0])
    $('#namaEdits').val(split[1])
    $('#usmEdits').val(split[2])
    $('#jklEdits').val(split[3])
    $('#nokarEdits').val(split[4])
    $('#lvlEdits').val(split[5])
    $('#idPEdits').val(split[6])
  }

	$(document).ready(function () {
    $('#asx').DataTable();
	});
</script>