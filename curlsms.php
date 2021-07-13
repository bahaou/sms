<?php


function send($appcode,$message,$identifier){

$webservice_url = "https://10.120.6.174.9010/Common/SMS.svc";

$request_param = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
   <soapenv:Header/>
   <soapenv:Body>
      <tem:SendSMS>
         <!--Optional:-->
         <tem:appCode>'.$appcode.'</tem:appCode>
         <!--Optional:-->
         <tem:messageBody>'.$message.'</tem:messageBody>
         <!--Optional:-->
         <tem:mobileNo>'.$identifier.'</tem:mobileNo>
      </tem:SendSMS>
   </soapenv:Body>
</soapenv:Envelope>';

$headers = array(
    'Content-Type: text/xml; charset=utf-8',
    'Content-Length: '.strlen($request_param)
);

$ch = curl_init($webservice_url);
curl_setopt ($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $request_param);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$data = curl_exec ($ch);

$result = $data;

if ($result === FALSE) {
    printf("CURL error (#%d): %s<br>\n", curl_errno($ch),
    htmlspecialchars(curl_error($ch)));
}

curl_close ($ch);



}

send('CLD','test','0530186545');

?>
