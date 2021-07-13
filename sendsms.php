<?php





function send($appcode,$message,$identifier){

/**
$client = new SoapClient(
			    "http://10.120.6.174:9010/Common/SMS.svc?wsdl",
			    array("appCode" => $appcode,
			    	"messageBody"=> $message,
			    	"mobileNo"=>$identifier
			    
			    )
			    
			);
			$response = $soap->Authenticate() ;
			*/
			$wsdl   = 'http://10.120.6.174:9010/Common/SMS.svc?wsdl';
$client = new SoapClient($wsdl, array('trace'=>1));  


$request_param = array("appCode" => $appcode,
			    	"messageBody"=> $message,
			    	"mobileNo"=>$identifier
			    
			    )
			    ;

try {
    $responce_param = $client->sendSMS($request_param);
	
} catch (Exception $e) { 

    echo $e->getMessage(); 
}


			
			
}






?>
