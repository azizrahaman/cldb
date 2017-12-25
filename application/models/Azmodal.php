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


}
