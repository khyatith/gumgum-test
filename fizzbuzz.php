<html>
<head>
<title>FizzBuzz</title>
</head>
<body>
<?php

	for($i = 1; $i <= 100; $i++){    
    echo ($i%3==0 ? ($i%5==0?"FizzBuzz":"Fizz") : ($i%5==0?"Buzz": $i))."\n";
}
?>
</body>
</html>
