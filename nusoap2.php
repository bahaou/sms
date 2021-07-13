<?php
require_once('lib/nusoap.php');
$wsdl = "http://10.120.6.174:9010/Common/SMS.svc?wsdl";
$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   echo '<h2>L\'erreur!</h2>' . $err;
   exit();
}
$r ='';
if ($_POST['getFlag'] !=''){
$result=$client->call('sendSMS', array('appCode'=>'CLD','messageBody'=>'baha','mobileNo'=>'+21695860772'));

}
    print_r($result);
?>
