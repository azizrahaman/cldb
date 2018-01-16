<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libraries extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$st = $this->session->userdata('status');
		if ($st!='Login') {
			header('location:'.base_url().'index.php/Login');
		}
    $this->load->model('Azmodal');

	}

// Organization Librasry Starts

		public function Organization()
		{
			$sql = $this->db->get('tbl_organization')->result();
			$msgerr = $this->session->flashdata('msgerr');
			$msgok = $this->session->flashdata('msgok');
			$msgdel = $this->session->flashdata('msgdel');
			$msgupdatefail = $this->session->flashdata('msgupdatefail');
			$msgupdatesucc = $this->session->flashdata('msgupdatesucc');
			$data = [
				'orgs' => $sql,
				'msgerr' => $msgerr,
				'msgok' => $msgok,
				'msgdel' => $msgdel,
				'msgupdatefail' => $msgupdatefail,
				'msgupdatesucc' => $msgupdatesucc
			];
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('libraries/liborg', $data);
			$this->load->view('footer');
		}

		public function AddOrg()
		{
			$this->Azmodal->AddOrgMod();
			redirect('Libraries/Organization');
		}

		public function DelOrg()
		{
			$orgid = $this->input->get('uid');
			$this->Azmodal->DelOrgMod($orgid);
			redirect('Libraries/Organization');
		}

		public function UpdateOrg()
		{
			$this->Azmodal->UpdateOrgMod();
			redirect('Libraries/Organization');
		}

		public function getDataTableTest()
		{
			$this->load->model("TableCrud");
			$fetch_data = $this->TableCrud->makeVillDatatables();
			$data = array();
			$i = 1;
			foreach ($fetch_data as $row) {
				$subarray = array();
				$subarray[] = $i;
				$subarray[] = $row->fld_orgname;
				$subarray[] = $row->fld_address;
				$subarray[] = $row->fld_details;



				$subarray[] = '<div class="btn-group"><button type="button" class="btn btn-warning btn-xs editOrgAj" name="update" data-uid="'.$row->fld_uid.'" >Edit</button><button type="button" class="btn btn-danger btn-xs delete-org-aj" name="delete" data-uid="'.$row->fld_uid.'" data-name="'.$row->fld_orgname.'">Delete</button></div>';
				//$subarray[] = '';
				$data[] = $subarray;

				$i++;
			}
			$output = array(
				'draw' => intval($_POST["draw"]),
				'recordsTotal' => $this->TableCrud->getVillAllData(),
				'recordsFiltered' => $this->TableCrud->getVillFilteredData(),
				"data" => $data
			);
			echo json_encode($output);
		}

		function insertDataAjax()
		{

			if($_POST["action"]=="Add")
			{
				$insert_data = array(
					'fld_orgname' => $this->input->post('addorgname'),
					'fld_address' => $this->input->post('addorgaddr'),
					'fld_details' => $this->input->post('addorgdetails')
				);
				$this->load->model('TableCrud');
				//$this->upload_image();
				$this->TableCrud->insert_crud('tbl_organization', $insert_data);

				echo 'Organizaion Inserted';
			}

			if ($_POST["action"]=="Edit") {
				$orgId = $this->input->post('orgid');
				$updated_data = array(
					'fld_orgname' => $this->input->post('addorgname'),
					'fld_address' => $this->input->post('addorgaddr'),
					'fld_details' => $this->input->post('addorgdetails'),
				);
				$this->load->model("TableCrud");
				$this->TableCrud->update_crud("fld_uid", "tbl_organization", $orgId, $updated_data);

				echo "Data Updated";
			}

		}

		function upload_image()
		{
			if(isset($_FILES["userImage"]))
			{
				$extension = explode('.', $_FILES['userImage']['name']);
				$new_name = rand() . '.' . $extension[1];
				$dest = "./assets/aziz/" . $new_name;
				move_uploaded_file($_FILES['userImage']['tmp_name'], $dest);
				return $new_name;
			}
		}

		function fetchSingleOrg()
		{
			$output=array();
			$this->load->model('TableCrud');
			$data = $this->TableCrud->fetchSingleRow($_POST['org_id'],'tbl_organization');

			foreach ($data as $row) {
				$output['org_name'] = $row->fld_orgname;
				$output['org_addr'] = $row->fld_address;
				$output['org_details'] = $row->fld_details;
			}

			echo json_encode($output);
		}

		function fetchSingleSuborg()
		{
			$output = array();
			$this->load->model('TableCrud');
			$data = $this->TableCrud->fetchSingleRow($_POST['suborg_id'], 'tbl_suborg');

			foreach ($data as $key) {
				$output['org_id'] = $key->fld_org_id;
				$output['suborg_name'] = $key->fld_suborg;
				$output['suborg_details'] = $key->fld_details;
			}

			echo json_encode($output);
		}


		function GetOrgName()
	  {
	    $this->Azmodal->getAllTableData();
	  }

		function InsertSubOrg()
		{
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('orgForSuborg', 'Organization ID', 'required');
			$this->form_validation->set_rules('suborgname', 'Sub Organization Name', 'required');
			$this->form_validation->set_rules('suborgdetails', 'Sub Organization Details', 'required');

			if($this->form_validation->run()==False) {
					exit();
			} else {
				if ($_POST['suborgaction'] == 'Add') {
					$Data = array();
					$Data['fld_org_id'] = $this->input->post('orgForSuborg');
					$Data['fld_suborg'] = $this->input->post('suborgname');
					$Data['fld_details'] = $this->input->post('suborgdetails');
					$this->load->model('TableCrud');
					$this->TableCrud->insert_crud('tbl_suborg',$Data);
				}
				if ($_POST['suborgaction'] == 'Edit') {
					$Data = array();
					$suborgId = $this->input->post('suborgid');
					$Data['fld_org_id'] = $this->input->post('orgForSuborg');
					$Data['fld_suborg'] = $this->input->post('suborgname');
					$Data['fld_details'] = $this->input->post('suborgdetails');
					$this->load->model('TableCrud');
					$this->TableCrud->update_crud('fld_uid', 'tbl_suborg', $suborgId, $Data);
					echo "Data Updated";
				}
			}

		}



		function getSubOrgTable()
		{
			$this->load->model("TableCrud");
			$fetch_data = $this->TableCrud->makeSubOrgDatatables();
			$data = array();
			$i = 1;
			foreach ($fetch_data as $row) {
				$subarray = array();
				$subarray[] = $i;
				$subarray[] = $row->fld_orgname;
				$subarray[] = $row->fld_suborg;
				$subarray[] = $row->fld_details;

				$subarray[] = '<div class="btn-group"><button type="button" class="btn btn-warning btn-xs editsubOrgAj" name="update" data-souid="'.$row->fld_uid.'" >Edit</button><button type="button" class="btn btn-danger btn-xs delete-suborg-aj" name="delete" data-souid="'.$row->fld_uid.'" data-soname="'.$row->fld_suborg.'">Delete</button></div>';
				//$subarray[] = '';
				$data[] = $subarray;

				$i++;
			}
			$output = array(
				'draw' => intval($_POST["draw"]),
				'recordsTotal' => $this->TableCrud->getSuborgAll(),
				'recordsFiltered' => $this->TableCrud->getFilteredSuborg(),
				"data" => $data
			);
			echo json_encode($output);
		}

		function DelSubOrg()
		{
			$suborgId = $this->input->post('suborgId');
			$this->load->model('TableCrud');
			$this->TableCrud->delete_single_item($suborgId, 'tbl_suborg');
			echo "Deleted";
		}

	// Organization Librasry Ends

	// Village Librasry Starts

		public function Village()
		{

			$sql = $this->db->get('tbl_division')->result();
			$data = [
				'divs' => $sql,
				'msgerr' => $this->session->flashdata('msgerr'),
				'msgok' => $this->session->flashdata('msgok')
			];

			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('libraries/libvill',$data);
			$this->load->view('footer');
		}

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
		public function GetVillData()
		{
			$uniid = $this->input->post('union_id');
			$this->Azmodal->GetVillMod($uniid);
		}
		public function GetVillTable()
		{
			$uniid = $this->input->post('union_id');

			$this->load->model("TableCrud");
			$fetch_ward = $this->TableCrud->fetch_all($uniid,'tbl_village');
			$data = array();
			$i = 1;
			foreach ($fetch_ward as $row) {
					$subarray = array();
					$subarray[] = $i;
					$subarray[] = $row->fld_name;
					$subarray[] = $row->fld_bn_name;
					$subarray[] = $row->fld_ward_no;

					$subarray[] = '<div class="btn-group"><button type="button" class="btn btn-warning btn-xs edit-vill-aj" name="update" data-uid="'.$row->fld_uid.'" >Edit</button><button type="button" class="btn btn-danger btn-xs deleteVillAj" name="delete" data-uid="'.$row->fld_uid.'" data-name="'.$row->fld_name.'">Delete</button></div>';
					$subarray[] = '';
					$data[] = $subarray;

					$i++;
			}
			$output = array(
				'recordsTotal' => $this->TableCrud->getVillAllData(),
				'recordsFiltered' => $this->TableCrud->getVillFilteredData(),
				"data" => $data
			);
			echo json_encode($output);
		}

		function addVillage()
		{

			if ($_POST['villaction']=='Add') {
				$incomming_data = array(
					'fld_union_id' => $this->input->post('unionId'),
					'fld_name' => $this->input->post('inputVillName'),
					'fld_bn_name' => $this->input->post('inputVillNameBn'),
					'fld_ward_no' => $this->input->post('inputwardno')
				);

				$this->load->model('TableCrud');
				$this->TableCrud->insert_crud('tbl_village', $incomming_data);
				echo "Data Inserted";
			}

			elseif ($_POST['villaction']=='Edit') {
				$villID = $this->input->post('villId');
				$updated_data = array(
					'fld_name' => $this->input->post('inputVillName'),
					'fld_bn_name' => $this->input->post('inputVillNameBn'),
					'fld_ward_no' => $this->input->post('inputwardno')
				);
				$this->load->model("TableCrud");
				$this->TableCrud->update_crud("fld_uid", "tbl_village", $villID, $updated_data);
				echo "Data Updated " . $villID . "aaa";

			}

		}

		function fetchSingleVill()
		{
			$villID = $this->input->post('vill_id');
			$output=array();
			$this->load->model('TableCrud');
			$data = $this->TableCrud->fetchSingleOrg($villID,'tbl_village');

			foreach ($data as $row) {
				$output['vill_name'] = $row->fld_name;
				$output['vill_namebn'] = $row->fld_bn_name;
			}
			echo json_encode($output);
		}

		function delSingleVill()
		{
			$this->load->model('TableCrud');
			$this->TableCrud->delete_single_item($_POST['vill_id'], 'tbl_village');
			echo "Village Deleted";
		}



	// Village Librasry Ends

}
