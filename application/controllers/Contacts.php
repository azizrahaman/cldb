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
    $this->load->view('header');
    $this->load->view('sidebar');
    $this->load->view('contacts/addcontact');
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
}


?>
