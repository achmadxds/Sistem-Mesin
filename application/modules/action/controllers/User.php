<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct()
	{
    parent::__construct();
    $this->load->model('Action_model');
	}

	public function index()
	{
    $data['getUser'] = $this->Action_model->GetAllUser();
    $data['lvluser'] = $this->Action_model->GetAllLevelUser();
    $this->load->view('v_listUser', $data);
	}

  public function Update()
  {
    $this->Action_model->UpdateUser();
    $this->session->set_flashdata('afterUpdate', 'value');
    redirect('action/User');
  }

  public function Delete($idUser, $idPengguna)
  {
    $this->Action_model->DeleteUser($idUser, $idPengguna);
    $this->session->set_flashdata('afterDelete', 'value');
    redirect('action/User');
  }

  public function UpdateStatusUser($idUser)
  {
    $this->Action_model->UpdateStatus($idUser);
    $this->session->set_flashdata('afterAktivasi', 'value');
    redirect('action/User');
  }

  public function Leveluser()
  {
    $data['getLvl'] = $this->Action_model->GetAllLevelUser();
    $this->load->view('v_listLevel', $data);
  }

  public function AddLeveluser()
  {
    $this->Action_model->AddLevel();
    $this->session->set_flashdata('afterAddLevel', 'value');
    redirect('action/User/Leveluser');
  }

  public function EditLeveluser()
  {
    $this->Action_model->UpdateLevel();
    $this->session->set_flashdata('afterEditLevel', 'value');
    redirect('action/User/Leveluser');
  }

  public function DeleteLevelUser($idLevel)
  {
    $this->Action_model->DeleteLevel($idLevel);
    $this->session->set_flashdata('afterDelete', 'value');
    redirect('action/User/Leveluser');
  }
}
