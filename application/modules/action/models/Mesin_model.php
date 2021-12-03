<?php
defined('BASEPATH') or exit('No script access allowed');

class Mesin_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function GetAllMesin()
  {
    $qs = $this->db->query("SELECT `idMesin`, `nmMesin`, `seriMesin`, `buatan`, `thn_operasi` FROM `mesin`")->result();
    return $qs;
  }

  public function AddMesin()
  {
    $nm = $_POST['NmMesinInput'];
    $seri = $_POST['SeriInput'];
    $btn = $_POST['BuatanInput'];
    $to = $_POST['TahunOperasiInput'];
    $usr = $this->session->userdata('idUser');

    $this->db->query("INSERT INTO `mesin` (`nmMesin`, `seriMesin`, `buatan`, `thn_operasi`, `usrInput`) VALUES ('$nm','$seri','$btn','$to','$usr')");
  }

  public function UpdateMesin()
  {
    $id = $_POST['idMesinEdit'];
    $nm = $_POST['NmMesinEdit'];
    $seri = $_POST['SeriEdit'];
    $btn = $_POST['BuatanEdit'];
    $to = $_POST['TahunOperasiEdit'];
    $usr = $this->session->userdata('idUser');

    $this->db->query("UPDATE `mesin` SET `nmMesin`='$nm', `seriMesin`='$seri', `buatan`='$btn', `thn_operasi`='$to', `usrInput`='$usr' WHERE `idMesin`='$id' ");
  }

  public function DeleteMesin($idLevel)
  {
    $this->db->query("DELETE FROM `mesin` WHERE `idMesin`='$idLevel' ");
  }
}
