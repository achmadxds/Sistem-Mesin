<?php defined('BASEPATH') or exit('No direct script access allowed');

class Peralatan extends MY_Controller
{
	public function __construct()
	{
    parent::__construct();
    $this->load->model('Peralatan_model');
    $this->load->model('Mesin_model');
	}

	public function index()
	{
    $data['getAlat'] = $this->Peralatan_model->GetAllPeralatan();
    $this->load->view('v_listPeralatan', $data);
	}

  public function ValidasiPeralatan($id)
  {
    $this->Perawatan_model->Validasi($id);
    $this->session->set_flashdata('afterValidasi', 'value');
    redirect('action/Perawatan');
  }

  public function AddPeralatan()
  {
    $this->Peralatan_model->AddPeralatan();
    $this->session->set_flashdata('afterAddAlat', 'value');
    redirect('action/Peralatan');
  }

  public function EditPeralatan()
  {
    $this->Peralatan_model->UpdatePeralatan();
    $this->session->set_flashdata('afterEditAlat', 'value');
    redirect('action/Peralatan');
  }

  public function DeletePeralatan($idMesin)
  {
    $this->Peralatan_model->DeletePeralatan($idMesin);
    $this->session->set_flashdata('afterDelete', 'value');
    redirect('action/Peralatan');
  }
}
