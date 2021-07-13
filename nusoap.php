<?php


require_once('lib/nusoap.php');

$wsdl   = "https://10.120.6.174.9010/Common/SMS.svc?wsdl";
$client = new nusoap_client($wsdl, 'wsdl');

$action = "sendSMS"; // webservice method name

$result = array();


$input = '<sendSMS xmlns="https://www.w3schools.com/xml/"><appCode>CLD</appCode> 
							<messageBody>test2</messageBody>
							<mobileNo>0530186545</mobileNo>
		
		
</sendSMS>';

if (isset($action))
{
    $result['response'] = $client->call($action, $input);
}

echo $result;


?>



