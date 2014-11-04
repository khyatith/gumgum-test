<?php

//create array

for($i=0;$i<=100;$i++)
{
$array[$i]=$i;
}

// mark fizz
for($i=3;$i<=100;$i=$i+3)
{
	$array[$i]="Fizz";
}

//mark buzz
for($i=5;$i<=100;$i=$i+5)
{
	$array[$i]="Buzz";
}

//mark FizzBuzz
for($i=15;$i<=100;$i=$i+15)
{
	$array[$i]="FizzBuzz";
}

echo $array; 
?>