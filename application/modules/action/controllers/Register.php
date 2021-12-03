<?php defined('BASEPATH') or exit('No direct script access allowed');

class Register extends MY_Controller
{
	public function __construct()
	{
    parent::__construct();
    $this->load->model('Action_model');
	}

	public function index()
	{
    $data['lvlUser'] = $this->Action_model->GetAllLevelUser();
    $this->load->view('regist', $data);
	}
  
  public function Regist()
  {
    $this->Action_model->Register();
    $this->session->set_flashdata('afterDaftar', 'value');
    redirect('action/Login');
  }
}
