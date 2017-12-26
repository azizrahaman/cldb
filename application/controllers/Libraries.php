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
			$msgupdate = $this->session->flashdata('msgupdate');
			$data = [
				'orgs' => $sql,
				'msgerr' => $msgerr,
				'msgok' => $msgok,
				'msgdel' => $msgdel,
				'msgupdate' => $msgupdate
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
				$this->db->insert('tbl_organization', $add);
				$this->session->set_flashdata('msgok', 'Organization addred successfully!');
			}
			redirect('Libraries/Organization');
		}

		public function DelOrg()
		{
			$orgid = $this->input->get('uid');
			$this->Azmodal->delete('tbl_organization','fld_uid',$orgid);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msgdel', 'Organization Deleted Successfully!');
			} else {
				$this->session->set_flashdata('msgdel', 'Somethig wrong happen in database! Contact developer.');
			}
			redirect('Libraries/Organization');
		}

		public function UpdateOrg()
		{
			$this->form_validation->set_rules('orgid', 'OrgID', 'trim|required');
			$this->form_validation->set_rules('orgname', 'OrgName', 'trim|required');
			$this->form_validation->set_rules('orgaddr', 'Address', 'trim|required');
			$this->form_validation->set_rules('orgdetails', 'Details', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msgupdate', 'Something went wrong! Organization not updated!');
			} else {
				$orgid = $this->input->post('orgid');
				$orgname = $this->input->post('orgname');
				$orgaddr = $this->input->post('orgaddr');
				$orgdetails = $this->input->post('orgdetails');

				$update = array('fld_orgname' => $orgname, 'fld_address' => $orgaddr, 'fld_details' => $orgdetails);
				$this->Azmodal->update('tbl_organization', $update, 'fld_uid', $orgid);
				$this->session->set_flashdata('msgupdate', 'Organization update successfully!');
			}
			redirect('Libraries/Organization');
		}

	// Organization Librasry Ends

	// Division Librasry Starts

		public function Division()
		{
			$sql = $this->db->get('tbl_devision')->result();
			$msgerr = $this->session->flashdata('msgerr');
			$msgok = $this->session->flashdata('msgok');
			$msgdel = $this->session->flashdata('msgdel');
			$msgupdate = $this->session->flashdata('msgupdate');
			$data = [
				'divis' => $sql,
				'msgerr' => $msgerr,
				'msgok' => $msgok,
				'msgdel' => $msgdel,
				'msgupdate' => $msgupdate
			];
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('libraries/libdiv', $data);
			$this->load->view('footer');
		}

		public function AddDiv()
		{
			$this->form_validation->set_rules('divname', 'DivName', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msgerr', 'Something went wrong! Organization not inserted!');
			} else {
				$orgname = $this->input->post('orgname');
				$orgaddr = $this->input->post('orgaddr');
				$orgdetails = $this->input->post('orgdetails');

				$add = array('fld_orgname' => $orgname, 'fld_address' => $orgaddr, 'fld_details' => $orgdetails);
				$this->db->insert('tbl_organization', $add);
				$this->session->set_flashdata('msgok', 'Organization addred successfully!');
			}
			redirect('Libraries/Organization');
		}

		public function DelDiv()
		{
			$orgid = $this->input->get('uid');
			$this->Azmodal->delete('tbl_organization','fld_uid',$orgid);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msgdel', 'Organization Deleted Successfully!');
			} else {
				$this->session->set_flashdata('msgdel', 'Somethig wrong happen in database! Contact developer.');
			}
			redirect('Libraries/Organization');
		}

		public function UpdateDiv()
		{
			$this->form_validation->set_rules('orgid', 'OrgID', 'trim|required');
			$this->form_validation->set_rules('orgname', 'OrgName', 'trim|required');
			$this->form_validation->set_rules('orgaddr', 'Address', 'trim|required');
			$this->form_validation->set_rules('orgdetails', 'Details', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msgupdate', 'Something went wrong! Organization not updated!');
			} else {
				$orgid = $this->input->post('orgid');
				$orgname = $this->input->post('orgname');
				$orgaddr = $this->input->post('orgaddr');
				$orgdetails = $this->input->post('orgdetails');

				$update = array('fld_orgname' => $orgname, 'fld_address' => $orgaddr, 'fld_details' => $orgdetails);
				$this->Azmodal->update('tbl_organization', $update, 'fld_uid', $orgid);
				$this->session->set_flashdata('msgupdate', 'Organization update successfully!');
			}
			redirect('Libraries/Organization');
		}

	// Division Librasry Ends

}
