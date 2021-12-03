<?php
defined('BASEPATH') or exit('No script access allowed');

class Perawatan_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function GetAllPerawatan()
  {
    if($this->session->userdata('level') == "TEKNISI") {
      $qs = $this->db->query("SELECT a.idPerawatan, a.idPengguna , a.status ,a.idMesin ,a.kodePerawatan, a.tgl_perawatan, a.ket_perawatan, c.nmMesin, b.namaPengguna FROM `perawatan` a, `pengguna` b, `mesin` c, `user` d where a.usrInput = d.idUser and a.idMesin = c.idMesin and a.idPengguna = b.idPengguna ")->result();
    } else {
      $qs = $this->db->query("SELECT a.idPerawatan, a.idPengguna , a.status ,a.idMesin ,a.kodePerawatan, a.tgl_perawatan, a.ket_perawatan, c.nmMesin, b.namaPengguna FROM `perawatan` a, `pengguna` b, `mesin` c where a.idMesin = c.idMesin and a.idPengguna = b.idPengguna")->result();
    }
    return $qs;
  }

  public function AddPerawatan()
  {
    $mesin = $_POST['idMesinPerawatan'];
    $ket = $_POST['ketPerawatan'];
    $rand = rand(0000000, 999999);
    $now = date('Y-m-d');

    $idP = $this->session->userdata('idPengguna');
    $usr = $this->session->userdata('idUser');
    $level = $this->session->userdata('level');

    if($level == 'ADMIN') $status = 1;
    else if($level == 'TEKNISI') $status = 0;

    $this->db->query("INSERT INTO `perawatan` (`idMesin`, `idPengguna`, `kodePerawatan`, `tgl_perawatan`, `ket_perawatan`, `status`, `usrInput`) VALUES ('$mesin','$idP','$rand','$now','$ket','$status','$usr')");
  }

  public function Validasi($id)
  {
    $this->db->query("UPDATE `perawatan` SET `status`='1' WHERE `idPerawatan`='$id' ");
  }

  public function UpdatePerawatan()
  {
    $id = $_POST['idPerawatanEdit'];
    $mesin = $_POST['MesinEdit'];
    $ket = $_POST['KetEdits'];

    $this->db->query("UPDATE `perawatan` SET `idMesin`='$mesin', `ket_perawatan`='$ket' WHERE `idPerawatan`='$id' ");
  }

  public function DeletePerawatan($idLevel)
  {
    $this->db->query("DELETE FROM `perawatan` WHERE `idPerawatan`='$idLevel' ");
  }
}
