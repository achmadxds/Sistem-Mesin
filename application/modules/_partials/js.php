<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<script src="<?php echo base_url('assets/vendors/apexcharts/apexcharts.js') ?>"></script>
<script src="<?php echo base_url('assets/js/pages/dashboard.js') ?>"></script>

<script src="<?php echo base_url('assets/js/main.js') ?>"></script>

<!-- <script src="<?php echo base_url('assets/vendors/simple-datatables/simple-datatables.js') ?>"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url('assets/vendors/simple-datatables/simple-datatables.js') ?>"></script> -->
<script src="<?php echo base_url('js/main.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script>
  var base_url = '<?php echo site_url() ?>';
</script>

<!-- <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script> -->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  function deleteConfirm(url) {
    swal({
        title: "Yakin Menghapus data ini?",
        text: "Ketika data dihapus maka tidak dapat dikembalikan",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Berhasil Menghapus Golongan", {
            icon: "success",
          });
          window.location.href = url;
      }
    });
  }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"> </script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script> -->

