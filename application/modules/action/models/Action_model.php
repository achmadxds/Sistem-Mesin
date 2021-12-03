<?php
defined('BASEPATH') or exit('No script access allowed');

class Action_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function Register()
  {
    $nm = $_POST['namaDaftar'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['levelDaftar'];

    $a = $this->db->query("SELECT AUTO_INCREMENT as ai FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'pkl_mesin' AND TABLE_NAME = 'pengguna' ")->row();

    $this->db->query("INSERT INTO `user` (`nmPengguna`, `username`, `password`, `status`, `idLevel`, `idPengguna`) 
    VALUES ('$nm','$username','$password','0','$level','$a->ai')");
    $this->InsertPengguna();
  }

  public function InsertPengguna()
  {
    $now = date('Y-m-d H:i:s');
    $nm = $_POST['namaDaftar'];
    $noKar = $_POST['noKaryDaftar'];
    $jekel = $_POST['jekelDaftar'];
    $alamat = $_POST['alamatDaftar'];
    $jabatan = $_POST['jabatanDaftar'];

    $this->db->query("INSERT INTO `pengguna`(`namaPengguna`, `nokaryawan`, `jekel`, `alamat`, `jabatan`, `tglDaftar`) 
    VALUES ('$nm','$noKar','$jekel','$alamat','$jabatan','$now')");
  }

  public function GetAllUser()
  {
    $qs = $this->db->query("SELECT a.idUser, a.status, a.idPengguna, a.username ,c.nmLevel, c.idLevel ,b.jekel, b.namaPengguna, b.nokaryawan, b.jabatan FROM `user` a, `pengguna` b, `leveluser` c WHERE a.idLevel=c.idLevel and a.idPengguna=b.idPengguna")->result();
    return $qs;
  }

  public function UpdateUser()
  {
    $idP = $_POST['idPEdits'];
    $id = $_POST['idEdits'];
    $nm = $_POST['namaEdits'];
    $usm  = $_POST['usmEdits'];
    $jkl = $_POST['jklEdits'];
    $nokar = $_POST['nokarEdits'];
    $lvl = $_POST['lvlEdits']; 

    $this->db->query("UPDATE `user` SET `nmPengguna`='$nm',`username`='$usm',`idLevel`='$lvl' WHERE `idUser`='$id' ");
    $this->db->query("UPDATE `pengguna` SET `namaPengguna`='$nm',`nokaryawan`='$nokar',`jekel`='$jkl' WHERE `idPengguna`='$idP' ");
  }

  public function DeleteUser($idUser, $idPengguna)
  {
    $this->db->query("DELETE FROM `pengguna` WHERE `idPengguna`='$idPengguna' ");
    $this->db->query("DELETE FROM `user` WHERE `idUser`='$idUser' ");
  }

  public function UpdateStatus($idUser)
  {
    $this->db->query("UPDATE `user` SET `status`='1' where `idUser`='$idUser' ");
  }

  public function GetAllLevelUser()
  {
    $qs = $this->db->query("SELECT * FROM `leveluser`")->result();
    return $qs;
  }

  public function AddLevel()
  {
    $nm = $_POST['nmLevel'];
    $ket = $_POST['ketLevel'];
    $this->db->query("INSERT INTO `leveluser` (`nmLevel`, `ket`) VALUES ('$nm','$ket')");
  }

  public function UpdateLevel()
  {
    $id = $_POST['idLevelEdit'];
    $nm = $_POST['namaLevelEdit'];
    $ket = $_POST['ketLevelEdit'];

    $this->db->query("UPDATE `leveluser` SET `nmLevel`='$nm',`ket`='$ket' WHERE `idLevel`='$id' ");
  }

  public function DeleteLevel($idLevel)
  {
    $this->db->query("DELETE FROM `leveluser` WHERE `idLevel`='$idLevel' ");
  }
}
