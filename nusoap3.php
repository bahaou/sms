<?php
function send($identifier,$message,$appcode){
require_once('lib1/nusoap.php');

$wsdl = "http://10.120.6.174:9010/Common/SMS.svc?wsdl";
$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur!</h2>' . $err;
   exit();
}


$result=$client->call('sendSMS', array('appCode'=>$appcode,'messageBody'=>$message,'mobileNo'=>$identifier));


  //  print_r($result);


}

send('0530186545','test','CLD');

?>
