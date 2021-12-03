<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mesin extends MY_Controller
{
	public function __construct()
	{
    parent::__construct();
    $this->load->model('Mesin_model');
	}

	public function index()
	{
    $data['getMesin'] = $this->Mesin_model->GetAllMesin();
    $this->load->view('v_listMesin', $data);
	}

  public function AddMesin()
  {
    $this->Mesin_model->AddMesin();
    $this->session->set_flashdata('afterAddMesin', 'value');
    redirect('action/Mesin');
  }

  public function EditMesin()
  {
    $this->Mesin_model->UpdateMesin();
    $this->session->set_flashdata('afterEditMesin', 'value');
    redirect('action/Mesin');
  }

  public function DeleteMesin($idMesin)
  {
    $this->Mesin_model->DeleteMesin($idMesin);
    $this->session->set_flashdata('afterDelete', 'value');
    redirect('action/Mesin');
  }
}
