<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TableCrud extends CI_Model
{

  // Datatable Making START


    var $tablevill = "tbl_village";
    var $select_column_vill = array('fld_uid' , 'fld_union_id', 'fld_name', 'fld_bn_name');
    var $order_column_vill = array(null, 'fld_union_id', 'fld_name', null, null);

    var $tableorg = "tbl_organization";
    var $select_column_org = array('fld_uid' , 'fld_orgname', 'fld_address', 'fld_details');
    var $order_column_org = array(null, 'fld_orgname', 'fld_address', null, null);


    var $tablesuborg = "tbl_suborg";
    var $select_column_suborg = array("tbl_suborg.fld_uid", 'tbl_suborg.fld_org_id', 'tbl_suborg.fld_suborg', 'tbl_suborg.fld_details', 'tbl_organization.fld_orgname');
    var $order_column_suborg = array(null, 'fld_suborg', 'fld_org_id', null);

    var $tabledesg = "tbl_designation";
    var $select_column_desg = array('fld_uid' , 'fld_desgname');
    var $order_column_desg = array(null, 'fld_desgname', null);

    var $tableuserinfo = "tbl_userinfo";
    var $select_column_user = array('tbl_userinfo.fld_uid', 'fld_gender', 'fld_name', 'fld_fname', 'fld_dob', 'fld_phone', 'fld_phone2', 'fld_phone3', 'fld_photo', 'fld_note', 'fld_creation', 'tua.fld_div_id_parma', 'tua.fld_dist_id_parma', 'tua.fld_upa_id_parma', 'tua.fld_uni_id_parma', 'tua.fld_vill_id_parma');
    var $order_column_user = array(null, 'fld_name', null, null, null);

// Organization orgDataTable

    function makeVillQuery()
    {
      $this->db->select($this->select_column_org);
      $this->db->from($this->tableorg);
      if (isset($_POST["search"]["value"]))
      {
        $this->db->like("fld_orgname", $_POST["search"]["value"]);
        $this->db->or_like("fld_address", $_POST["search"]["value"]);
      }



      if (isset($_POST["order"])) {
        $this->db->order_by($this->order_column_org[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
        $this->db->order_by('fld_uid', 'DESC');
      }
    }

    function makeVillDatatables()
    {
      $this->makeVillQuery();
      if ($_POST['length'] != -1) {
        $this->db->limit($_POST['length'], $_POST['start']);
      }
      $query = $this->db->get();
      return $query->result();
    }

    function getVillFilteredData()
    {
      $this->makeVillQuery();
      $query = $this->db->get();
      return $query->num_rows();
    }

    function getVillAllData()
    {
      $this->db->select('*');
      $this->db->from($this->tableorg);
      return $this->db->count_all_results();
    }

    // Datatable Making End

    // Suborganization table

    function makeSubOrgQuery() {

      $this->db->select($this->select_column_suborg);
      $this->db->from($this->tablesuborg);
      $this->db->join('tbl_organization', 'tbl_suborg.fld_org_id = tbl_organization.fld_uid');

      if (isset($_POST["search"]["value"])) {
        $this->db->like("fld_org_id", $_POST["search"]["value"]);
        $this->db->or_like("fld_suborg", $_POST["search"]["value"]);
      }

      if (isset($_POST["order"])) {
        $this->db->order_by($this->order_column_suborg[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
        $this->db->order_by('fld_uid', 'DESC');
      }

    }

    function makeSubOrgDatatables()
    {
      $this->makeSubOrgQuery();
      if ($_POST['length'] != -1) {
        $this->db->limit($_POST['length'], $_POST['start']);
      }

      $query = $this->db->get();
      return $query->result();
    }

    function getFilteredSuborg()
    {
      $this->makeSubOrgQuery();
      $query = $this->db->get();
      return $query->num_rows();
    }

    function getSuborgAll()
    {
      $this->db->select('*');
      $this->db->from($this->tablesuborg);
      return $this->db->count_all_results();
    }

    // Designation Table Queryis Starts

    function makeDesgQuery()
    {
      $this->db->select($this->select_column_desg);
      $this->db->from($this->tabledesg);
      if (isset($_POST["search"]["value"]))
      {
        $this->db->like("fld_desgname", $_POST["search"]["value"]);
      }


      if (isset($_POST["order"])) {
        $this->db->order_by($this->order_column_org[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
        $this->db->order_by('fld_uid', 'DESC');
      }
    }

    function makeDesgDatatables()
    {
      $this->makeDesgQuery();
      if ($_POST['length'] != -1) {
        $this->db->limit($_POST['length'], $_POST['start']);
      }
      $query = $this->db->get();
      return $query->result();
    }

    function getDesgFilteredData()
    {
      $this->makeDesgQuery();
      $query = $this->db->get();
      return $query->num_rows();
    }

    function getDesgAllData()
    {
      $this->db->select('*');
      $this->db->from($this->tabledesg);
      return $this->db->count_all_results();
    }

    // Designation Table Queryis Ends


    // User Table Query Starts

    function makeUserQuery()
    {
      $this->db->select($this->select_column_user);
      $this->db->from($this->tableuserinfo);
      $this->db->join('tbl_user_address as tua', 'tbl_userinfo.fld_uid = tua.fld_user_id', 'left');

      if (isset($_POST["search"]["value"])) {
        $this->db->like("fld_name", $_POST["search"]["value"]);
        $this->db->or_like("fld_phone", $_POST["search"]["value"]);
        $this->db->or_like("fld_phone2", $_POST["search"]["value"]);
        $this->db->or_like("fld_phone3", $_POST["search"]["value"]);
      }

      if (isset($_POST["order"])) {
        $this->db->order_by($this->order_column_user[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else {
        $this->db->order_by('fld_uid', 'DESC');
      }
    }

    function makeUserDatatables()
    {
      $this->makeUserQuery();
      if ($_POST['length'] != -1) {
        $this->db->limit($_POST['length'], $_POST['start']);
      }
      $query = $this->db->get();
      return $query->result();
    }

    function getUserFilteredData()
    {
      $this->makeUserQuery();
      $query = $this->db->get();
      return $query->num_rows();
    }

    function getUserAllData()
    {
      $this->db->select('*');
      $this->db->from($this->tableuserinfo);
      return $this->db->count_all_results();
    }

    // User Table Query Ends

    //Insert New Data

    function insert_crud($table, $data)
    {
      $this->db->insert($table, $data);
      $insert_id = $this->db->insert_id();
      return $insert_id;
    }

    //Fetch Single Row Item
    function fetchSingleRow($uid, $table)
    {
      $this->db->where("fld_uid", $uid);
      $query = $this->db->get($table);
      return $query->result();
    }

    //Update Crud
    function update_crud($colname, $tbl_name, $uid, $updated_data)  //Column name where data will be searchd, thne table name, then data to be searched and then updated data
    {
      $this->db->where($colname, $uid);
      $this->db->update($tbl_name, $updated_data);
    }

    //Get All Ward of a Union
    function fetch_all($uniid, $tbl_name)
    {
      $this->db->where('fld_union_id', $uniid);
      $query = $this->db->get($tbl_name);
      return $query->result();
    }

    function delete_single_item($id, $table)
    {
      $this->db->where("fld_uid", $id);
      $this->db->delete($table);
    }

}
