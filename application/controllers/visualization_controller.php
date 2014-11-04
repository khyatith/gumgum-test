<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Visualization_controller extends CI_Controller
{
public function __construct()
{
parent:: __construct();
$this->load->helper('url');
}
public function getdata()
{
$page = "http://api.worldbank.org/countries/USA/indicators/3.1_RE.CONSUMPTION?per_page=50&date=2000:2014&format=xml";

//getting xml namespace
$ns='wb';

//finds the children of the element on the url
$xml=simplexml_load_file($page);
$datecombine='';
$valuecombine='';

//iterate over the children and store the values in the variables
foreach($xml->children($ns,true) as $i)
{

$nonzero=$i->value;
if($nonzero!="")
{
$data['country']=$i->country;
$datecombine .= $i->date.",";
$valuecombine .= $i->value.",";

}

}

$data['date']=$datecombine;
$data['value']=$valuecombine;
$this->load->view('visualization_view.php',$data);
}
}
