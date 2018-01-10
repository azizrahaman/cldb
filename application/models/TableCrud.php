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

    function insertOrgMod($data)
    {
      $this->db->insert('tbl_organization', $data);
    }

}
