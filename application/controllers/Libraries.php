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

	public function Organization()
	{
		$sql = $this->Azmodal->select('tbl_organization')->result();
		$msgerr = $this->session->flashdata('msgerr');
		$msgok = $this->session->flashdata('msgok');
		$msgdel = $this->session->flashdata('msgdel');
		$data = [
			'orgs' => $sql,
			'msgerr' => $msgerr,
			'msgok' => $msgok,
			'msgdel' => $msgdel
		];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('libraries/liborg', $data);
		$this->load->view('footer');
	}
	public function AddOrg()
	{
		$this->form_validation->set_rules('orgname', 'OrgName', 'trim|required');
		$this->form_validation->set_rules('orgaddr', 'Address', 'trim|required');
		$this->form_validation->set_rules('orgdetails', 'Details', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msgerr', 'Something went wrong! Organization not inserted!');
		} else {
			$orgname = $this->input->post('orgname');
			$orgaddr = $this->input->post('orgaddr');
			$orgdetails = $this->input->post('orgdetails');

			$add = array('fld_orgname' => $orgname, 'fld_address' => $orgaddr, 'fld_details' => $orgdetails);
			$this->Azmodal->insert('tbl_organization', $add);
			$this->session->set_flashdata('msgok', 'Organization addred successfully!');
		}
		redirect('Libraries/Organization');
	}
	public function DelOrg()
	{
		$this->session->set_flashdata('msgerr', 'Hello');
		$this->session->set_flashdata('msgok', 'Hello');
		$this->session->set_flashdata('msgdel', 'Hello');
	}
	public function UpdateOrg()
	{
		# code...
	}
}
