<?php 

$method= $_SERVER['REQUEST_METHOD'];

if($method == "POST")
{
	
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$getcity = $json->queryResult->parameters->text;
	$api_key= "44376623d6ff1998efb2f5439172362a";


	$Api_url  = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=${getcity}&units=metric&appid=${api_key}");
	$newdata = json_decode($Api_url);



	 $temp = $newdata->main->temp;
	 $city = $newdata->name;
	 $condition = $newdata->weather[0]->description;


	 $message = " ${city} has ${temp} Celsius  Temperature right now and it is ${condition}. Type Stop to finish the conservation.";


	$response = new \stdClass();
	$response->fulfillmentMessages[0]->text->text[0] =$message;

	
		// //$gettemp = $newdata->message;
 



	



	
	echo json_encode($response);
}


?>
