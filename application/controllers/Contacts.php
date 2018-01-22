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
    $this->load->view('contacts/Userinfo');
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

    $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('fullname', 'Full Name', 'required');
    $this->form_validation->set_rules('phoneno', 'Phone', 'required');

    if($this->form_validation->run()==False) {
        exit();
    }
    else {
      $gender = $this->input->post('gender');
      $name = $this->input->post('fullname');
      $fathername = $this->input->post('fathername');
      $phone = $this->input->post('phoneno');
      $phone2 = $this->input->post('phoneno2');
      $phone3 = $this->input->post('phoneno3');
      $dob = strtotime($this->input->post('dob'));
      $dob = date("Y-m-d", $dob);
      
      if($this->input->post('division-parma') != null ? $divisionpar = $this->input->post('division-parma') : $divisionpar = '');
      if($this->input->post('district-parma') != null ? $districtpar = $this->input->post('district-parma') : $districtpar = '');
      if($this->input->post('upazilla-parma') != null ? $upazillapar = $this->input->post('upazilla-parma') : $upazillapar = '');
      if($this->input->post('union-parma') != null ? $unionpar = $this->input->post('union-parma') : $unionpar = '');
      if($this->input->post('village-parma') != null ? $villpar = $this->input->post('village-parma') : $villpar = '');
      if($this->input->post('division-prese') != null ? $divisionpre = $this->input->post('division-prese') : $divisionpre = '');
      if($this->input->post('district-prese') != null ? $districtpre = $this->input->post('district-prese') : $districtpre = '');
      if($this->input->post('upazilla-prese') != null ? $upazillapre = $this->input->post('upazilla-prese') : $upazillapre = '');
      if($this->input->post('union-prese') != null ? $unionpre = $this->input->post('union-prese') : $unionpre = '');
      if($this->input->post('village-prese') != null ? $villpre  = $this->input->post('village-prese') : $villpre = '');

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

      $useraddress = array();

      $useraddress['fld_user_id'] = $userId;
      $useraddress['fld_div_id_parma'] = $divisionpar;
      $useraddress['fld_dist_id_parma'] = $districtpar;
      $useraddress['fld_upa_id_parma'] = $upazillapar;
      $useraddress['fld_uni_id_parma'] = $unionpar;
      $useraddress['fld_vill_id_parma'] = $villpar;
      $useraddress['fld_div_id_prese'] = $divisionpre;
      $useraddress['fld_dist_id_prese'] = $districtpre;
      $useraddress['fld_upa_id_prese'] = $upazillapre;
      $useraddress['fld_uni_id_prese'] = $unionpre;
      $useraddress['fld_vill_id_prese'] = $villpre;

      if (is_array($useraddress)) {
        $this->TableCrud->insert_crud('tbl_user_address', $useraddress);
      }

      echo "Address Inserted";

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

      foreach ($data as $row => $value) {
        $profession = array();
        $profession['fld_user_id'] = $userId;
        $profession['fld_org_id'] = (isset($value['orgs']) ? $value['orgs'] : '');
        $profession['fld_suborg_id'] =  (isset($value['sorg']) ? $value['sorg'] : '');
        $profession['fld_desg_id'] = (isset($value['desg']) ? $value['desg'] : '');

        $orgs_insert = $this->TableCrud->insert_crud('tbl_user_working', $profession);
        echo 'Profession Inserted';

      }
    }

  }

  function GetUserInformation()
  {
    $this->load->model("TableCrud");
    $fetch_data = $this->TableCrud->makeUserDatatables();
    $data = array();
    $i = 1;
    foreach ($fetch_data as $row) {
      $subarray = array();
      $subarray[] = $i;
      $subarray[] = $row->fld_name;
      $subarray[] = $row->fld_fname;
      $subarray[] = $row->fld_phone;
      $subarray[] = $row->fld_phone2;

      //$subarray[] = '';
      $data[] = $subarray;

      $i++;
    }
    $output = array(
      'draw' => intval($_POST["draw"]),
      'recordsTotal' => $this->TableCrud->getUserAllData(),
      'recordsFiltered' => $this->TableCrud->getUserFilteredData(),
      "data" => $data
    );
    echo json_encode($output);
  }

}


?>
