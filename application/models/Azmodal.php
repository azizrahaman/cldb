<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This is a customized Modal designed by Aziz
 */
class Azmodal extends CI_Model
{

    public function select($table) {
      return $this->db->get($table);
    }

    public function selectwhere($table, $data) {
      return $this->db->get_where($table, $data);
    }

    function delete($table, $fldname, $flddata) {
      $this->db->delete($table, array($fldname => $flddata));
    }

    function update($table, $data, $where, $key) {
      $this->db->where($where, $key);
      $this->db->update($table, $data);
    }

    function loginAction($u, $p) {
      $username = $u;
      $password = $p;
      $login = $this->db->get_where('tbl_admin', array('fld_username' => $username, 'fld_password' => $password));
      if (count($login->result()>=0)) {
        foreach ($login->result() as $key) {
            // $xyz = var_dump($key);
            // echo "<script>alert(".$xyz.")</script>";
            $sess['status'] = 'Login';
            $sess['name'] = $key->fld_name;
            $sess['username'] = $key->fld_username;
            $this->session->set_userdata($sess);
        }
        header('location:'.base_url().'index.php/Welcome');
      } else {
        header('location:'.base_url().'index.php/Login');
      }
    }

    public function AddOrgMod()
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
    }

    public function DelOrgMod($orgid)
    {
      $this->delete('tbl_organization','fld_uid',$orgid);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msgdel', 'Organization Deleted Successfully!');
			} else {
				$this->session->set_flashdata('msgdel', 'Somethig wrong happen in database! Contact developer.');
			}
    }

    public function UpdateOrgMod()
    {
      $this->form_validation->set_rules('orgid', 'OrgID', 'trim|required');
			$this->form_validation->set_rules('orgname', 'OrgName', 'trim|required');
			$this->form_validation->set_rules('orgaddr', 'Address', 'trim|required');
			$this->form_validation->set_rules('orgdetails', 'Details', 'trim');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msgupdatefail', 'Something went wrong! Organization not updated!');
			} else {
				$orgid = $this->input->post('orgid');
				$orgname = $this->input->post('orgname');
				$orgaddr = $this->input->post('orgaddr');
				$orgdetails = $this->input->post('orgdetails');

				$update = array('fld_orgname' => $orgname, 'fld_address' => $orgaddr, 'fld_details' => $orgdetails);
				$this->Azmodal->update('tbl_organization', $update, 'fld_uid', $orgid);
				$this->session->set_flashdata('msgupdatesucc', 'Organization update successfully!');
			}
    }

    public function GetDistMod($divid)
    {
      if ($divid != NULL) {
				$sql = $this->db->get_where('tbl_district', array('fld_division_id' => $divid))->result();
        echo "<option></option>";
				foreach ($sql as $key) {
					echo "<option value=".$key->fld_id.">".$key->fld_bn_name."</option>";
				}
			} else {
				exit;
			}
    }

    public function GetUpazilaMod($distid)
    {
      if ($distid != NULL) {
				$sql = $this->db->get_where('tbl_upazila', array('fld_district_id' => $distid))->result();
        echo "<option></option>";
        foreach ($sql as $key) {
					echo "<option value=".$key->fld_id.">".$key->fld_bn_name."</option>";
				}
			} else {
				exit;
			}
    }

    public function GetUniMod($upaid)
    {
      if ($upaid != NULL) {
				$sql = $this->db->get_where('tbl_unions', array('fld_upazila_id' => $upaid))->result();
        echo "<option></option>";
        foreach ($sql as $key) {
					echo "<option value=".$key->fld_id.">".$key->fld_bn_name."</option>";
				}
			} else {
				exit;
			}
    }

    public function GetVillMod($uniid)
    {
      if ($uniid != NULL) {
        $n = 1;
				$sql = $this->db->get_where('tbl_village', array('fld_union_id' => $uniid))->result();
				foreach ($sql as $key) {
          echo "<tr>";
					echo "<td>".$n."</td>";
          echo "<td>".$key->fld_name."</td>";
          echo "<td>".$key->fld_bn_name."</td>";
          echo "</tr>";
          $n++;
				}
			} else {
				exit;
			}
    }

    public function AddVillMod()
    {
      $this->form_validation->set_rules('uniid', 'UnionID', 'trim|required');
			$this->form_validation->set_rules('villname', 'VillageName', 'trim|required');
			$this->form_validation->set_rules('villnamebn', 'BanglaName', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msgerr', 'Something went wrong! Village not inserted!');
			} else {
				$uniid = $this->input->post('uniid');
				$villname = $this->input->post('villname');
				$villnamebn = $this->input->post('villnamebn');

				$add = array('fld_union_id' => $uniid, 'fld_name' => $villname, 'fld_bn_name' => $villnamebn);
				$this->db->insert('tbl_village', $add);
				$this->session->set_flashdata('msgok', 'Village addred successfully!');
			}
    }


}
