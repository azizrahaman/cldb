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
  public function AddContact()
  {
    $this->load->library('form_validation');
    $this->load->helper('form');

    echo "Name: ";
    echo $gender = $this->input->post('gender');
    echo "<br>";
    echo "Name: ";
    echo $name = $this->input->post('fullname');
    echo "<br>";
    echo "F Name: ";
    echo $fathername = $this->input->post('fathername');
    echo "<br>";
    echo "Phone 1: ";
    echo $phone = $this->input->post('phoneno');
    echo "<br>";
    echo "Phone 2: ";
    echo $phone2 = $this->input->post('phoneno2');
    echo "<br>";
    echo "Phone 3: ";
    echo $phone3 = $this->input->post('phoneno3');
    echo "<br>";
    echo "Org: ";
    echo "<br>";
    echo $dob = $this->input->post('dob');
    echo "<br>";
    echo "Division-P: ";
    echo $divisionpar = $this->input->post('division-parma');
    echo "<br>";
    echo "Dist-P: ";
    echo $districtpar = $this->input->post('district-parma');
    echo "<br>";
    echo "SubDist-P: ";
    echo $upazillapar = $this->input->post('upazila-parma');
    echo "<br>";
    echo "Union-P: ";
    echo $unionpar = $this->input->post('union-parma');
    echo "<br>";
    echo "Vill-P: ";
    echo $villpar = $this->input->post('village-parma');
    echo "<br>";
    echo "Divi-R: ";
    echo $divisionpre = $this->input->post('division-prese');
    echo "<br>";
    echo "Dist-R: ";
    echo $districtpre = $this->input->post('district-prese');
    echo "<br>";
    echo "SubDist-R: ";
    echo $upazillapre = $this->input->post('upazila-prese');
    echo "<br>";
    echo "Unin-R: ";
    echo $unionpre = $this->input->post('union-prese');
    echo "<br>";
    echo "Village-R: ";
    echo $villpre = $this->input->post('village-prese');
    echo "<br>";
    echo "Notes: ";
    $note = $this->input->post('userdetails');
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    $timestamp = date('Y-m-d H:i:s',$timestamp);

    print_r($note);
    echo "<br>";




    $inputuser = array();
    $inputuser['fld_gender'] = $gender;
    $inputuser['fld_isAdmin'] = '0';
    $inputuser['fld_isEmp'] = '0';
    $inputuser['fld_name'] = $name;
    $inputuser['fld_fname'] = $fathername;
    $inputuser['fld_dob'] = $dob;
    $inputuser['fld_phone'] = $phone;
    $inputuser['fld_phone2'] = $phone2;
    $inputuser['fld_phone3'] = $phone3;
    $inputuser['fld_status'] = '0';
    $inputuser['fld_photo'] = '0';
    $inputuser['fld_note'] = $note;
    $inputuser['fld_isActive'] = '1';

    $this->load->model('TableCrud');
    $userId = $this->TableCrud->insert_crud('tbl_userinfo', $inputuser);
    //$this->db->insert('tbl_userinfo', $inputuser);
    echo "Data Inserted";

    echo "<br>";
    $data = array();
    $org = $this->input->post('organization');
    $suborg = $this->input->post('suborg');
    $desg = $this->input->post('designation');
    if (is_array($org)) {
      $i = 0;
      foreach ($org as $key) {
        $data[$i]['orgs'] = $key;
        $i++;
      }
    }
    if (is_array($suborg)) {
      $i = 0;
      foreach ($suborg as $key) {
        $data[$i]['sorg'] = $key;
        $i++;
      }
    }
    if (is_array($desg)) {
      $i = 0;
      foreach ($desg as $key) {
        $data[$i]['desg'] = $key;
        $i++;
      }
    }
    print_r($data);
    echo "<br>";
    foreach ($data as $row => $value) {
      $profession = array();
      $profession['fld_user_id'] = $userId;
      $profession['fld_org_id'] = (isset($value['datas']) ? $value['datas'] : '');
      $profession['fld_suborg_id'] =  (isset($value['sorg']) ? $value['sorg'] : '');
      $profession['fld_desg_id'] = (isset($value['desg']) ? $value['desg'] : '');



    }

  }
}


?>
