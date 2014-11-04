<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Display_cities extends CI_Controller
{
public function __construct()
{
parent:: __construct();
$this->load->helper('url');
}
public function display_firstpage()
{
$data=array();
$this->load->model('populatecities');
$data['query2'] = $this->populatecities->retrievecities();
$this->load->view('FirstPage.php',$data);
}
public function storecities()
{
$cityname=$this->input->post('city');
$page = "http://api.openweathermap.org/data/2.5/weather?q=$cityname";

//using curl to get the data from the API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $page);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$contents = curl_exec ($ch);
curl_close ($ch);

//decoding the fetched json value
$resArray = array();
$resArr = json_decode($contents,true);

//storing fetched values from json in variables
$description= $resArr['weather']['0']['description'];
$temperature=$resArr['main']['temp'];
$dateofcreation= date('Y-m-d');
$latitude=$resArr['coord']['lat'];
$longitude=$resArr['coord']['lon'];

//storing the values in the database
$this->load->model('populatecities');
$data['query'] = $this->populatecities->create_temp_log($cityname,$temperature,$description,$dateofcreation);
$data['query1']=$latitude;
$data['query2']=$longitude;
$data['query3']=$cityname;
$data['query4']=$temperature;
$data['query5']=$description;

//getting cities value from table cities to populate the search field on DisplayWeather view
$data['query6'] = $this->populatecities->retrievecities();

//loading the view
$this->load->view('DisplayWeather.php',$data);
}
}
?>
