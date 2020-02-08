<?php 

$method= $_SERVER['REQUEST_METHOD'];

if($method == "POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$text = $json->queryResult->parameters->text;
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
	  $response->displayText =$speech;


	
	echo json_encode($response);
}
else {
	echo "Method not allowed";
}

?>
