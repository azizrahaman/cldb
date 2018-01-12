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

    //Insert New Data

    function insert_crud($table, $data)
    {
      $this->db->insert($table, $data);
    }

    //Fetch Single Organization Item
    function fetchSingleOrg($uid, $table)
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
