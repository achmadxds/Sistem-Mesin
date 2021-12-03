<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view("../../_partials/head.php") ?>
</head>

<body>
  <div id="app">
    <?php $this->load->view("../../_partials/sidebar.php") ?>
    <div id="main">
      <div class="page-content">
        <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="card shadow-lg">
                <div class="card-body">
                  <center>
                    <font face="Tahoma">Selamat Datang, <?php echo $this->session->userdata('namaUser') . " - " . $this->session->userdata('level') ?></font><br>

                    <br><br>
                    <font face="Tahoma">Anda telah masuk di Sistem PKL Mesin<br>
                      Universitas Muria Kudus</font><br>
                  </center><br>
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