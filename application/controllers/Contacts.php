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
    $this->load->view('contacts/addcontact');
    $this->load->view('footer');
    echo "View Contacts";
  }
  function Add_Contact()
  {
    echo "View Contacts";
  }
  function Send_SMS()
  {
    echo "View Contacts";
  }
}


?>
