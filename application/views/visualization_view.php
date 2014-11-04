<html>
  <head>
<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {
var str = document.getElementById("input2").value;
var str1=document.getElementById("input3").value;
var temp = new Array();
temp = str.split(",");
temp1=new Array();
temp1=str1.split(",");

var data = new google.visualization.DataTable();

  
  data.addColumn('string', 'Initial Value');
data.addColumn('number', 'Percentage Change in Value');
data.addColumn({type:'string',role:'annotation'});

 var x;
for (x =0; x <temp.length; x++) {
  data.addRow([temp[x],(temp1[x]-temp1[x+1])/temp1[x],temp1[x]]);
 
}

var options = {
title: 'World Bank Data',
hAxis: {title: 'Year', titleTextStyle: {color: 'red'}},
width: 2500,
height: 400,
bar: {groupWidth: "20%"}

};

var table = new google.visualization.ColumnChart(document.getElementById('table_div'));

table.draw(data,options);
}
</script>
  </head>
  <body>


<input type="hidden" value="<?php echo $country;?>" id="input1"/>
<input type="hidden" value="<?php echo $date;?>" id="input2"/>
<input type="hidden" value="<?php echo $value;?>" id="input3"/>
<div id="table_div" style="width: 900px; height: 500px;"></div>
 
</body>
</html>
