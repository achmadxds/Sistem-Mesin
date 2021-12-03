<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan extends MY_Controller
{
	public function __construct()
	{
    parent::__construct();
    $this->load->model('Keluhan_model');
    $this->load->model('Mesin_model');
	}

	public function index()
	{
    $data['listKeluhan'] = $this->Keluhan_model->GetAllKeluhan();
    $data['listMesin'] = $this->Mesin_model->GetAllMesin();
    $this->load->view('v_listKeluhan', $data);
	}

  public function AddKeluhan()
  {
    $this->Keluhan_model->AddKeluhan();
    $this->session->set_flashdata('afterAddKeluhan', 'value');
    redirect('action/Keluhan');
  }

  public function Validasis($ids)
  {
    $this->Keluhan_model->Validasi($ids);
    $this->session->set_flashdata('afterValidasi', 'value');
    redirect('action/Keluhan');
  }

  public function ValidasiMengerjakan()
  {
    $this->Keluhan_model->ValidasiMengerjakan();
    $this->session->set_flashdata('afterValidasiMengerjakan', 'value');
    redirect('action/Keluhan');
  }

  public function EditKeluhan()
  {
    $this->Keluhan_model->UpdateKeluhan();
    $this->session->set_flashdata('afterEditKeluhan', 'value');
    redirect('action/Keluhan');
  }

  public function DeleteKeluhan($idMesin)
  {
    $this->Keluhan_model->DeleteKeluhan($idMesin);
    $this->session->set_flashdata('afterDelete', 'value');
    redirect('action/Keluhan');
  }
}
