<?php
defined('BASEPATH') or exit('No script access allowed');

class Keluhan_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function GetAllKeluhan()
  {
    $usr = $this->session->userdata('idUser');
    $as = $this->session->userdata('level');

    switch ($as) {
      case 'OPERATOR':
        $qs = $this->db->query("SELECT a.status, a.idKeluhan, a.keluhan, b.nmMesin, b.idMesin, a.ket_perbaikan, a.jenisKeluhan, c.nmPengguna, (select x.nmPengguna from `user` x, `keluhan` d where d.usrPerbaikan=x.idUser ) as tukang FROM `keluhan` a, `mesin` b, `user` c WHERE a.usrInput = c.idUser and a.idMesin = b.idMesin and a.usrInput = '$usr' ")->result();
        break;

      case 'TEKNISI':
        $qs = $this->db->query("SELECT a.status ,a.idKeluhan, a.keluhan, b.nmMesin, b.idMesin, a.ket_perbaikan, a.jenisKeluhan, c.nmPengguna, (select x.nmPengguna from `user` x, `keluhan` d where d.usrPerbaikan=x.idUser ) as tukang FROM `keluhan` a, `mesin` b, `user` c WHERE a.usrInput = c.idUser and a.idMesin = b.idMesin ")->result();
        break;
      
      default:
        $qs = $this->db->query("SELECT a.status ,a.idKeluhan, a.keluhan, b.nmMesin, b.idMesin, a.ket_perbaikan, a.jenisKeluhan, c.nmPengguna, (select x.nmPengguna from `user` x, `keluhan` d where d.usrPerbaikan=x.idUser ) as tukang FROM `keluhan` a, `mesin` b, `user` c WHERE a.usrInput = c.idUser and a.idMesin = b.idMesin ")->result();
        break;
    }
    return $qs;
  }

  public function AddKeluhan()
  {
    $nm = $_POST['mesinKeluhan'];
    $jns = $_POST['jnsKeluhan'];
    $klhn = $_POST['keluhans'];

    $usr = $this->session->userdata('idUser');

    $this->db->query("INSERT INTO `keluhan` (`idMesin`, `jenisKeluhan`, `keluhan`, `status`, `usrInput`) VALUES ('$nm','$jns','$klhn','0','$usr')");
  }

  public function Validasi($id)
  {
    $this->db->query("UPDATE `keluhan` SET `status`='1' WHERE `idKeluhan`='$id' ");
  }

  public function ValidasiMengerjakan()
  {
    $id = $_POST['idKeluhanEditz'];
    $ket = $_POST['keteranganValidasi'];
    $usr = $this->session->userdata('idUser');

    $this->db->query("UPDATE `keluhan` SET `ket_perbaikan`='$ket', `usrPerbaikan`='$usr' WHERE `idKeluhan`='$id' ");
  }

  public function UpdateKeluhan()
  {
    $id = $_POST['idKeluhanEdit'];
    $nm = $_POST['mesinKeluhanEdit'];
    $jns = $_POST['jnsKeluhanEdit'];
    $klhn = $_POST['keluhansEdit'];

    $this->db->query("UPDATE `keluhan` SET `idMesin`='$nm',`jenisKeluhan`='$jns',`keluhan`='$klhn' WHERE `idKeluhan`='$id' ");
  }

  public function DeleteKeluhan($idLevel)
  {
    $this->db->query("DELETE FROM `keluhan` WHERE `idKeluhan`='$idLevel' ");
  }
}
