<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function logined()
	{
		$usm = $_POST['usernameLogin'];
		$pswd = $_POST['passwordLogin'];

		$qs = $this->db->query("SELECT a.idUser, a.status, c.nmLevel, a.idPengguna ,b.jekel, b.namaPengguna, b.nokaryawan, b.jabatan FROM `user` a, `pengguna` b, `leveluser` c WHERE a.idLevel=c.idLevel and a.idPengguna=b.idPengguna and a.username = '$usm' and a.password='$pswd' and a.status != 0");
		
		if($qs->num_rows() >= 1) {
			$x = $qs->row();
			$this->session->set_userdata('level', $x->nmLevel);
			$this->session->set_userdata('idUser', $x->idUser);
			$this->session->set_userdata('idPengguna', $x->idPengguna);
			$this->session->set_userdata('namaUser', $x->namaPengguna);
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('gglLogin', 'value');
			redirect('action/login');
		}
	}

	public function logout()
  {
    $this->session->sess_destroy();
    redirect('action/login');
  }
}
