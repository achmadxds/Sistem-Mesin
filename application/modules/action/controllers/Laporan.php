<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('Pdf');
    $this->load->model('Keluhan_model');
    $this->load->model('Perawatan_model');
  }

  public function index()
  {
    $this->load->view('v_lapDashboard');
  }

  public function eprint()
  {
    $jns = $_POST['jnsLaporan'];
    $thn = $_POST['thnLaporan'];

    switch ($jns) {
      case 'P':
        $this->CetakPerawatan($thn);
        break;

      case 'K':
        $this->CetakKeluhan($thn);
        break;

      default:
        print_r("Ada Kesalahan, Kembali ke awal!");
        redirect('action/Laporan');
    }
  }

  public function CetakPerawatan($thn)
  {
    $qs = $this->db->query("SELECT a.idPerawatan, a.idPengguna , a.status ,a.idMesin ,a.kodePerawatan, a.tgl_perawatan, a.ket_perawatan, c.nmMesin, b.namaPengguna FROM `perawatan` a, `pengguna` b, `mesin` c where a.idMesin = c.idMesin and a.idPengguna = b.idPengguna and year(a.tgl_perawatan) = '$thn' and a.status=1 ")->result();
    $now = date("Y-m-d");

    $pdf = new FPDF('P', 'mm', 'Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 7, 'LAPORAN PERAWATAN TAHUN ' . $thn, 0, 1, 'C');
    $pdf->Cell(0, 7, 'Sistem PKL Mesin', 0, 1, 'C');
    $pdf->Cell(10, 7, '', 0, 1);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 7, 'Tgl Cetak : ' . date('d-m-Y', strtotime($now)), 0, 1, 'L');
    $pdf->Cell(10, 6, 'No', 1, 0, 'C');
    $pdf->Cell(40, 6, 'Nama Mesin', 1, 0, 'C');
    $pdf->Cell(25, 6, 'Kode', 1, 0, 'C');
    $pdf->Cell(40, 6, 'Keterangan', 1, 0, 'C');
    $pdf->Cell(40, 6, 'Teknisi', 1, 0, 'C');
    $pdf->Cell(40, 6, 'Tanggal Perawatan', 1, 1, 'C');
    $no=1;
    foreach ($qs as $key => $value) {
      $pdf->Cell(10, 6, $no++, 1, 0, 'C');
      $pdf->Cell(40, 6, $value->nmMesin, 1, 0, 'C');
      $pdf->Cell(25, 6, $value->kodePerawatan, 1, 0, 'C');
      $pdf->Cell(40, 6, $value->ket_perawatan, 1, 0, 'C');
      $pdf->Cell(40, 6, $value->namaPengguna, 1, 0, 'C');
      $pdf->Cell(40, 6, $value->tgl_perawatan, 1, 1, 'C');
    }
    $pdf->Output();
  }

  public function CetakKeluhan($thn)
  {
    $qs = $this->db->query("SELECT a.status ,a.idKeluhan, a.keluhan, b.nmMesin, b.idMesin, a.ket_perbaikan, a.jenisKeluhan, c.nmPengguna, (select x.nmPengguna from `user` x, `keluhan` d where d.usrPerbaikan=x.idUser ) as tukang FROM `keluhan` a, `mesin` b, `user` c WHERE a.usrInput = c.idUser and a.idMesin = b.idMesin")->result();
    $now = date("Y-m-d");

    $pdf = new FPDF('P', 'mm', 'Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 7, 'LAPORAN KELUHAN SISTEM MESIN ', 0, 1, 'C');
    $pdf->Cell(0, 7, 'Sistem PKL Mesin', 0, 1, 'C');
    $pdf->Cell(10, 7, '', 0, 1);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 7, 'Tgl Cetak : ' . date('d-m-Y', strtotime($now)), 0, 1, 'L');
    $pdf->Cell(10, 6, 'No', 1, 0, 'C');
    $pdf->Cell(40, 6, 'Nama Mesin', 1, 0, 'C');
    $pdf->Cell(25, 6, 'Jenis Keluhan', 1, 0, 'C');
    $pdf->Cell(40, 6, 'Keluhan', 1, 0, 'C');
    $pdf->Cell(40, 6, 'Teknisi', 1, 0, 'C');
    $pdf->Cell(40, 6, 'Keterangan Perbaikan', 1, 1, 'C');
    $no=1;
    foreach ($qs as $key => $value) {
      $pdf->Cell(10, 6, $no++, 1, 0, 'C');
      $pdf->Cell(40, 6, $value->nmMesin, 1, 0, 'C');
      $pdf->Cell(25, 6, $value->jenisKeluhan, 1, 0, 'C');
      $pdf->Cell(40, 6, $value->keluhan, 1, 0, 'C');
      $pdf->Cell(40, 6, $value->tukang, 1, 0, 'C');
      $pdf->Cell(40, 6, $value->ket_perbaikan, 1, 1, 'C');
    }
    $pdf->Output();
  }
}
