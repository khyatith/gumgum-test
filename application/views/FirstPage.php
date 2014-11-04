<!DOCTYPE html>
<head>
<title>Weather Application</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/weatherapp.css">
</head>
<body>
<div class="navbar navbar-inverse">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    
<img src="/assets/imgs/Weather-icon.png" style="width:40px;height:45px">
  </div>
  <div class="navbar-collapse collapse navbar-inverse-collapse">
    <ul class="nav navbar-nav">
      
      <li><a href="http://cs-server.usc.edu:5928/CodeIgniter/index.php/weatherapp/display_cities/display_firstpage">Home</a></li>
      </ul>
   
    
  </div>
</div>
<div class="page-header">
<h1>Welcome To Weather App</h1>
</div>
<div class="container">
<form class="form-horizontal" method="post" action="http://10.0.2.15/index.php/display_cities/storecities">
<select class="form-control" id="citySelect" name="city">
<?php
//filling the select list with values from database
foreach($query2 as $row)
{
?>
<option value="<?  echo $row->cityname;?>"><?php echo $row->cityname;?></option>
<?php
}

?>
</select>
<br/><br/>
<div class="form-actions">
<input type="submit" class="btn btn-info"/> 
</div>
</form>
</div> 

<script type="text/javascript" src="/assets/js/jquery-1.3.2.min.js"></script>

</body>
</html>
