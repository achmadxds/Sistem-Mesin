<?php
defined('BASEPATH') or exit('No script access allowed');

class Peralatan_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function GetAllPeralatan()
  {
    $qs = $this->db->query("SELECT `idPeralatan`, `nama`, `jumlah`, `kondisi`, `keterangan`, `lokasi` FROM `peralatan`")->result();
    return $qs;
  }

  public function AddPeralatan()
  {
    $nm = $_POST['nmAlat'];
    $jmlh = $_POST['jmlhAlat'];
    $knds = $_POST['kondisiAlat'];
    $ket = $_POST['ketAlat'];
    $lok = $_POST['lokAlat'];

    $usr = $this->session->userdata('idUser');

    $this->db->query("INSERT INTO `peralatan`(`nama`, `jumlah`, `kondisi`, `keterangan`, `lokasi`, `usrInput`) VALUES ('$nm','$jmlh','$knds','$ket','$lok','$usr')");
  }

  public function UpdatePeralatan()
  {
    $id = $_POST['idAlatEdit'];
    $nm = $_POST['nmAlatEdit'];
    $jmlh = $_POST['jmlhAlatEdit'];
    $knds = $_POST['kondisiAlatEdit'];
    $ket = $_POST['ketAlatEdit'];
    $lok = $_POST['lokAlatEdit'];

    $usr = $this->session->userdata('idUser');

    $this->db->query("UPDATE `peralatan` SET `nama`='$nm',`jumlah`='$jmlh',`kondisi`='$knds',`keterangan`='$ket',`lokasi`='$lok',`usrInput`='$usr' WHERE `idPeralatan`='$id' ");
  }

  public function DeletePeralatan($idLevel)
  {
    $this->db->query("DELETE FROM `peralatan` WHERE `idPeralatan`='$idLevel' ");
  }
}
