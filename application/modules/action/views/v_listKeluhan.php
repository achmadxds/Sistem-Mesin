<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view("../../_partials/head.php") ?>
</head>

<body>
  <?php 
    if ($this->session->flashdata('afterAddKeluhan')) echo '<script> swal("Berhasil!", "Berhasil Menambah Keluhan!!", "success") </script>';
    if ($this->session->flashdata('afterEditKeluhan')) echo '<script> swal("Berhasil!", "Berhasil Mengubah Keluhan!!", "success") </script>';
    if ($this->session->flashdata('afterValidasiMengerjakan')) echo '<script> swal("Berhasil!", "Berhasil Mengerjakan Keluhan!!", "success") </script>';
    if ($this->session->flashdata('afterValidasi')) echo '<script> swal("Berhasil!", "Berhasil Mensetujui Keluhan!!", "success") </script>';
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
                  <h2 class="d-inline"><b>Manajemen Keluhan</b></h2>
                  <?php
                    if($this->session->userdata('level') != 'TEKNISI') {
                      echo '<a data-bs-toggle="modal" data-bs-target="#axoax" class="btn btn-primary d-inline" style="float : right;"><i class="fas fa-plus-square"></i> Tambah Keluhan</a>';
                    }
                  ?>
                  <hr>
                  <table class="table-active text-dark text-center table table-bordered table-hover table-responsive" id="asx">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Mesin</th>
                        <th>Jenis Keluhan</th>
                        <th>Keluhan</th>
                        <th>Penginput</th>
                        <th>Teknisi</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                        $i = 1;
                        foreach ($listKeluhan as $v) {
                          ?>
                            <tr>
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $v->nmMesin ?></td>
                              <td><?php echo $v->jenisKeluhan ?></td>
                              <td><?php echo $v->keluhan ?></td>
                              <td><?php echo $v->nmPengguna ?></td>
                              <td><?php $v->tukang != null ? $a = $v->tukang : $a = '-'; echo $a ?></td>
                              <td><?php echo $v->ket_perbaikan ?></td>
                              <td>
                                <?php 
                                  if($v->status != 0) {
                                    echo '<a href="javascript:void(0)" class="btn btn-success">Selesai</a>';
                                  } else {
                                    echo '<a href="javascript:void(0)" class="btn btn-danger">Belum Selesai</a>';
                                  }
                                ?>
                              </td>
                              <td>
                                <?php
                                  switch ($this->session->userdata('level')) {
                                    case 'TEKNISI':
                                      if($v->tukang == null) {
                                        ?>
                                          <a href="<?php echo site_url('action/Keluhan/ValidasiMengerjakan/'.$value->idKeluhan) ?>" data-bs-toggle="modal" data-bs-target="#jfgdsjf" data-id="<?php echo $v->idKeluhan ?>" onclick="assd(this)" class="btn btn-success">Kerjakan</a>
                                        <?php
                                      }
                                      break;

                                    case 'ADMIN':
                                      if($v->tukang != null) {
                                        if($v->status != 1) {
                                          ?>
                                            <a href="<?php echo site_url('action/Keluhan/Validasis/'.$v->idKeluhan) ?>" onclick="return confirm('Beneran Mau Disetujui?')" class="btn btn-success">Setujui</a> |
                                          <?php
                                        }
                                      }
                                      ?> 
                                        <a href="<?php echo site_url('action/Keluhan/DeleteKeluhan/'.$v->idKeluhan) ?>" onclick="return confirm('Beneran Mau Hapus?')" class="btn btn-danger">Hapus</a>
                                      <?php
                                      break;
                                      
                                    default:
                                      ?>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="clicked9(this)" data-id="<?php echo $v->idKeluhan . "~" . $v->idMesin . "~" . $v->jenisKeluhan . "~" . $v->keluhan ?>" class="btn btn-primary">Ubah</a>
                                        | 
                                        <a href="<?php echo site_url('action/Keluhan/DeleteKeluhan/'.$v->idKeluhan  ) ?>" onclick="return confirm('Beneran Mau Hapus?')" class="btn btn-danger">Hapus</a>  
                                      <?php
                                      break;
                                  }
                                ?>
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
      <form action="<?php echo site_url('action/Keluhan/AddKeluhan') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Tambah Keluhan</h4>
          <hr>
          <div class="form-group">
            <label for="">Mesin</label>
            <select name="mesinKeluhan" id="" class="form-control">
              <option value="">~ PILIH ~</option>
              <?php
                foreach ($listMesin as $value) {
                  ?> <option value="<?php echo $value->idMesin ?>"><?php echo $value->nmMesin ?></option> <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Jenis Keluhan</label>
            <select name="jnsKeluhan" id="" class="form-control">
              <option value="">~ PILIH ~</option>
              <option value="Ringan">Ringan</option>
              <option value="Sedang">Sedang</option>
              <option value="Berat">Berat</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Keluhan</label>
            <textarea name="keluhans" class="form-control" id="" cols="30" rows="2"></textarea>
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
      <form action="<?php echo site_url('action/Keluhan/EditKeluhan') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Ubah Keluhan</h4>
          <hr>
          <input type="hidden" name="idKeluhanEdit" id="idKeluhanEdit">
          <div class="form-group">
            <label for="">Mesin</label>
            <select name="mesinKeluhanEdit" id="mesinKeluhanEdit" class="form-control">
              <option value="">~ PILIH ~</option>
              <?php
                foreach ($listMesin as $value) {
                  ?> <option value="<?php echo $value->idMesin ?>"><?php echo $value->nmMesin ?></option> <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Jenis Keluhan</label>
            <select name="jnsKeluhanEdit" id="jnsKeluhanEdit" class="form-control">
              <option value="">~ PILIH ~</option>
              <option value="Ringan">Ringan</option>
              <option value="Sedang">Sedang</option>
              <option value="Berat">Berat</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Keluhan</label>
            <textarea name="keluhansEdit" class="form-control" id="keluhansEdit" cols="30" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnLogin">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="jfgdsjf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('action/Keluhan/ValidasiMengerjakan') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h4>Kerjakan Keluhan
          <hr>
          <input type="hidden" name="idKeluhanEditz" id="idKeluhanEditz">
          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keteranganValidasi" class="form-control" id="keteranganValidasi" cols="30" rows="2"></textarea>
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
  function assd(params) {
    let id = $(params).data('id')
    $('#idKeluhanEditz').val(id)
  }

  function clicked9(params) {
    let data = $(params).data('id')
    let split = data.split("~")

    console.log(split)

    $('#idKeluhanEdit').val(split[0])
    $('#mesinKeluhanEdit').val(split[1])
    $('#jnsKeluhanEdit').val(split[2])
    $('#keluhansEdit').val(split[3])
  }

	$(document).ready(function () {
    $('#asx').DataTable();
	});
</script>