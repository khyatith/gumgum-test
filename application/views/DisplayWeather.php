<!DOCTYPE html>
<head>
<title> Weather Application</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/weatherapp.css">
<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script type='text/javascript'>
google.load('visualization', '1', {'packages': ['geomap']});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
var data = new google.visualization.DataTable();
var latitude=document.getElementById('input1').value;
var longitude=document.getElementById('input2').value;
var cityname=document.getElementById('input3').value;
var temperature=document.getElementById('input4').value;



 data.addRows(2);

//adding columns in the map
 data.addColumn('number', 'LATITUDE', 'Latitude');
 data.addColumn('number', 'LONGITUDE', 'Longitude');
 data.addColumn('number', 'temperature', 'temperature');
 data.addColumn('string', 'cityname','cityname');

//setting the value
  data.setValue(0, 0, latitude);
  data.setValue(0, 1, longitude);
  data.setValue(0, 3, cityname);
  data.setValue(0, 2, temperature);
  
 
  
  var options = {};
//  options['region'] = 'US'; //not marking any region since it is not specific to US
options['colors'] = [0x00FF00, 0xFFFF00, 0xFF0000]; //orange colors
options['dataMode'] = 'markers';
options['width'] = '780px';
options['height'] = '418px';
  
  
  var geomap = new google.visualization.GeoMap(
  document.getElementById('map_canvas'));
  geomap.draw(data, options);
}

  </script>
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

      <li><a href="http://10.0.2.15/index.php/display_cities/display_firstpage">Home</a></li>
      </ul>
    <form method="post" class="navbar-form navbar-left" action="http://10.0.2.15/index.php/display_cities/storecities">
      <select name="city" id="searchcitytemp" class="form-control">
	<?php
	foreach($query6 as $row )
	{
	?>
<option value="<?php echo $row->cityname?>" <?php if(isset($_POST['city'])){echo "selected";} ?>><?php echo $row->cityname;?></option>
<?php
}
?>
	</select>
<input type="submit" class="btn btn-default"/>
    </form>

</div>
</div>
<div class="row">
 <div id='map_canvas' class="col-xs-6" style="margin-left:200px"></div>
</div>

<input type="hidden" value="<?php echo $query1?>" id="input1" />
<input type="hidden" value="<?php echo $query2?>" id="input2" />
<input type="hidden" value="<?php echo $query3?>" id="input3" />
<input type="hidden" value="<?php echo $query4?>" id="input4" />


</body>

</html>
