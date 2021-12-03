<?php
  if($this->session->userdata('level') != null) {
		redirect('Dashboard');	
	}
?>

<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view("../../_partials/head.php") ?>
</head>

<body>
  <?php 
    if ($this->session->flashdata('afterDaftar')) echo '<script> swal("Berhasil!", "Berhasil, Hubungi Admin Untuk Aktivasi Akun!!", "success") </script>';
    if ($this->session->flashdata('gglLogin')) echo '<script> swal("Gagal!", "Gagal, Hubungi Admin Untuk Aktivasi Akun / Daftar Akun!!", "error") </script>';
  ?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="d-flex justify-content-center mt-5">
            <div class="card shadow-lg col-lg-4 mt-5 border border-primary align-center">
              <div class="card-body">
                <h4 class="text-center"><b>Selamat Datang di Sistem PKL Mesin</b></h4>
                <hr>
                <form action="<?php echo site_url('action/Login/logined') ?>" method="post">
                  <div class="form-group">
                    <label for="totalSampah"><b>username</b></label>
                    <input type="text" class="form-control" name="usernameLogin" aria-describedby="emailHelp" placeholder="username">
                  </div>
                  <div class="form-group">
                    <label for="totalSampah"><b>Password</b></label>
                    <input type="password" class="form-control" name="passwordLogin" aria-describedby="emailHelp" placeholder="*******">
                  </div>
                  <input type="submit" class="btn btn-success text-center" value="Login">
                  <a href="<?php echo site_url('action/Register') ?>" class="btn btn-warning d-inline text-dark" style="float : right;"><i class="far fa-question-circle"></i> Daftar?</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("../../_partials/js.php") ?>
</body>

</html>