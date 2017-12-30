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

	// Organization Librasry Ends

	// Village Librasry Starts

		public function Village()
		{

			$sql = $this->db->get('tbl_division')->result();
			$data = [
				'divs' => $sql
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

	// Village Librasry Ends

}
