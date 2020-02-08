<?php 

$method= $_SERVER['REQUEST_METHOD'];

if($method == "POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$text = $json->queryResult->parameters->text;

	$Api_url  = "https://samples.openweathermap.org/data/2.5/find?q=${text}&units=imperial&appid=b1b15e88fa797225412429c1c50c122a1";

	 // $text = "ek";

	$response = new \stdClass();
	$response->speech = "";
	$response->displayText = "";
	$response->source = "webhook";

	switch ($text) {
		case 'abd':
			$speech = "i am abd";
			break;

		case 'ek':
			$speech = "i am ek";
			break;

		
		default:
		$speech = "Sorry i didnot get that!";
			# code...
			break;
	}

	
	 $response->speech =$speech;
	  $response->fulfillmentMessages[0]->text->text[0] =$speech;


	
	echo json_encode($response);
}
else {
	echo "Method not allowed";
}

?>
