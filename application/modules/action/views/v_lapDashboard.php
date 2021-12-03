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
          <div class="col-md-8">
            <div class="card shadow">
              <div class="card-header p-3 bg-primary text-white">
                <b>Manajemen Laporan</b>
              </div>
              <div class="card-body">
                <form action="<?php echo site_url('action/Laporan/eprint') ?>" method="post" enctype="multipart/form-data">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td width="30%">Jenis Laporan</td>
                        <td width="50%">
                          <select name="jnsLaporan" id="" class="form-control" width="50%" required>
                            <option value="">- Pilih -</option>
                            <option value="P"> Perawatan </option>
                            <option value="K"> Keluhan </option>
                          </select>
                          <small class="text-danger">* Kalau Pilih Keluhan, Isi Tahun apa saja!</small>
                        </td>
                      </tr>
                      <tr>
                        <td width="30%">Tahun</td>
                        <td width="50%">
                          <select name="thnLaporan" id="" class="form-control" width="50%" required>
                            <option value="">- Pilih -</option>
                            <option value="2020"> 2020 </option>
                            <option value="2021"> 2021 </option>
                            <option value="2022"> 2022 </option>
                            <option value="2023"> 2023 </option>
                          </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <input type="submit" name="submit" value="Tampilkan" class="btn btn-primary">
                </form>
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

  $(document).ready(function() {
    $('#asx').DataTable();
  });
</script>