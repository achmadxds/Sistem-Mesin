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
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="d-flex justify-content-center mt-5">
            <div class="card shadow-lg col-lg-5 mt-5 border border-primary align-center">
              <div class="card-body">
                <h4 class="text-center"><b>Daftar disini!</b></h4>
                <hr>
                <form action="<?php echo site_url('action/Register/Regist') ?>" method="post">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for=""><b>Nama</b></label>
                        <input type="text" class="form-control" name="namaDaftar" aria-describedby="emailHelp" placeholder="contoh : udin.." required>
                      </div>
                      <div class="form-group">
                        <label for=""><b>Jabatan</b></label>
                        <textarea name="jabatanDaftar" cols="30" rows="2" placeholder="contoh : Teknisi Mesin.." class="form-control" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for=""><b>Jenis Kelamin</b></label>
                        <select name="jekelDaftar" class="form-control" required>
                          <option value=""> ~ Pilih ~ </option>
                          <option value="Pria">Pria</option>
                          <option value="Wanita">Wanita</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><b>Username</b></label>
                        <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="contoh : akhi698.." required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for=""><b>No Karyawan</b></label>
                        <input type="text" class="form-control" name="noKaryDaftar" aria-describedby="emailHelp" placeholder="contoh : 90872.." required>
                      </div>
                      <div class="form-group">
                        <label for=""><b>Alamat</b></label>
                        <textarea name="alamatDaftar" cols="30" rows="2" placeholder="contoh : Mejobo rt 9 rw 2.." class="form-control" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for=""><b>Level</b></label>
                        <select name="levelDaftar" class="form-control" required>
                          <option value=""> ~ Pilih ~ </option>
                          <?php
                            foreach ($lvlUser as $value) { ?> <option value="<?php echo $value->idLevel ?>"><?php echo $value->nmLevel ?></option> <?php }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for=""><b>Password</b></label>
                        <input type="password" class="form-control" name="password" aria-describedby="emailHelp" placeholder="*******" required>
                      </div>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-success text-center" value="Daftar">
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