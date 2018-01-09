<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TableCrud extends CI_Model
{
    var $tablevill = "tbl_village";
    var $select_column_vill = array('fld_uid' , 'fld_union_id', 'fld_name', 'fld_bn_name');
    var $order_column_vill = array(null, 'fld_union_id', 'fld_name', null);

    function makeVillQuery()
    {
      $this->db->select($this->select_column_vill);
      $this->db->from($this->tablevill);
      if (isset($_POST["search"]["value"]))
      {
        $this->db->like("fld_union_id", $_POST["search"]["value"]);
        $this->db->like("fld_name", $_POST["search"]["value"]);
      }
      if (isset($_POST["order"])) {
        $this->db->order_by($this->order_column_vill[$_POST['order']['0']['column']], $_POST['order']['0'],['dir']);
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
      $this->db->from($this->tablevill);
      return $this->db->count_all_results();
    }

}
