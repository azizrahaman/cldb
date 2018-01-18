<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
		$st = $this->session->userdata('status');
		if ($st!='Login') {
			header('location:'.base_url().'index.php/Login');
		}
    $this->load->model('TableCrud');
    $this->load->model('Azmodal');
  }

  function View_Contacts()
  {
    $this->load->view('header');
    $this->load->view('sidebar');
    echo "View Contacts";
    $this->load->view('footer');

  }
  function Add_Contact()
  {
    $sql = $this->db->get('tbl_division')->result();
    $data = [
      'divs' => $sql
    ];
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('contacts/addcontact',$data);
    $this->load->view('footer');
  }


  function Export_Contacts()
  {
    $this->load->view('header');
    $this->load->view('sidebar');
    echo "Export Contacts";
    $this->load->view('footer');
  }
  function Send_SMS()
  {
    $this->load->view('header');
    $this->load->view('sidebar');

    $this->load->view('footer');
  }

  //Helper functions

  public function GetDistricts()
  {
    $divid = $this->input->post('get_option');
    $this->Azmodal->GetDistMod($divid);
  }

  public function GetUpazila()
  {
    $distid = $this->input->post('get_option');
    $this->Azmodal->GetUpazilaMod($distid);
  }

  public function GetUnions()
  {
    $upaid = $this->input->post('get_option');
    $this->Azmodal->GetUniMod($upaid);
  }
  public function GetVillages()
  {
    $unionid = $this->input->post('get_option');
    $this->Azmodal->GetVillagesMod($unionid);
  }

  //
  public function GetOrganization()
  {
    $this->Azmodal->getOrgaMod();
  }

  public function GetDesignation()
  {
    $this->Azmodal->getDesgMod();
  }
}


?>
