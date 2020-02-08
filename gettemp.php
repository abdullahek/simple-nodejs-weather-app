<?php 

$method= $_SERVER['REQUEST_METHOD'];

if($method == "POST")
{
	
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$getcity = $json->queryResult->parameters->text;

	$Api_url  = file_get_contents("https://samples.openweathermap.org/data/2.5/find?q=${getcity}&units=imperial&appid=b1b15e88fa797225412429c1c50c122a1");
	$newdata = json_decode($Api_url);



	 $temp = $newdata->list[0]->main->temp;
	 $city = $newdata->list[0]->name;

	 $message = " ${city} has ${temp} Celcuis Temperature right now.";


	$response = new \stdClass();
	$response->fulfillmentMessages[0]->text->text[0] =$message;

	
		// //$gettemp = $newdata->message;
 



	



	
	echo json_encode($response);
}


?>
