<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Populatecities extends CI_Model
{
function __construct()
{
parent::__construct();
$this->load->database();
}
function retrievecities(){

$sql=$this->db->query("select * from cities");
return $sql->result();

}
function create_temp_log($cityname,$temperature,$description,$dateofcreation)
{

//retrieving cityid  from cities table
$this->db->select('*');
$this->db->from('cities');
$this->db->where('cityname',$cityname);
$query=$this->db->get();


foreach($query->result() as $row)
{
$cityid=$row->cityid;
}

//inserting all the values from API in the temp_log table, while preventing SQL injection
$sql="insert into temp_log(cityid,temperature,description,date_of_creation) values (?,?,?,?)";
$this->db->query($sql,array($cityid,$temperature,$description,$dateofcreation));


}

}
