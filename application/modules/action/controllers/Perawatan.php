<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perawatan extends MY_Controller
{
	public function __construct()
	{
    parent::__construct();
    $this->load->model('Perawatan_model');
    $this->load->model('Mesin_model');
	}

	public function index()
	{
    $data['getRawat'] = $this->Perawatan_model->GetAllPerawatan();
    $data['listMesin'] = $this->Mesin_model->GetAllMesin();
    $this->load->view('v_listPerawatan', $data);
	}

  public function ValidasiPerawatan($id)
  {
    $this->Perawatan_model->Validasi($id);
    $this->session->set_flashdata('afterValidasi', 'value');
    redirect('action/Perawatan');
  }

  public function AddPerawatan()
  {
    $this->Perawatan_model->AddPerawatan();
    $this->session->set_flashdata('afterAddRawat', 'value');
    redirect('action/Perawatan');
  }

  public function EditPerawatan()
  {
    $this->Perawatan_model->UpdatePerawatan();
    $this->session->set_flashdata('afterEditRawat', 'value');
    redirect('action/Perawatan');
  }

  public function DeletePerawatan($idMesin)
  {
    $this->Perawatan_model->DeletePerawatan($idMesin);
    $this->session->set_flashdata('afterDelete', 'value');
    redirect('action/Perawatan');
  }
}
