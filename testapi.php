<?php 

$method= $_SERVER['REQUEST_METHOD'];

if($method == "GET")
{
	
	$text = "London";
	 // $text = "ek";

	$Api_url  = file_get_contents("https://samples.openweathermap.org/data/2.5/find?q=${text}&units=imperial&appid=b1b15e88fa797225412429c1c50c122a1");



	



	
	echo ($Api_url);
}


?>
