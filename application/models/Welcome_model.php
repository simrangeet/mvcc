<?php
class Welcome_model extends CI_Model {


 function getFeatures()
{
    $this->db->select('id, title, description');
    $this->db->from('tbl_features');
    $query = $this->db->get();
    $row = $query->result();
    return $row;

}
function getCourses()
{
    $this->db->select('*');
    $this->db->from('tbl_courses');
    $query=$this->db->get();
    $row=$query->result();
    return $row;
}

function setValues($data)
{
 $this->db->insert('tbl_contact',$data);   
}
}
?>