<?php


include('getuser.php');

//echo "The token is as follow: " . $token;
$token='';
if($result->num_rows > 0)
{
  $token=$row['token'];
}

else
{
  $token='';
}


if($token!='')
{
  


$curl = curl_init();

curl_setopt_array($curl, 
 array(
  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"to\": \"$token\",\r\n      \"data\": {\r\n        \"title\":\"title text\",\r\n        \"message\": \"messege text\",\r\n        \"channel_id\":\"fcm_default_channel\",\r\n        \"click_action\": \"FLUTTER_NOTIFICATION_CLICK\"\r\n      }\r\n    }",
  CURLOPT_HTTPHEADER => array(
    "authorization: key=AAAAU-rPGP4:APA91bHexPKPMPsjX_hcyLSTzc8sdzenQOyIhIUWSTcbtXyLRdDp_OV1fbWawGpqWjXVuseqTzX-JQkDCqsa_Mr9P7EVfOfSuvwIMFHa9TlHSf7Iyd5s-H67vhZW5q193M-ghHX-qAc6",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: cdc84002-6ded-d9aa-dc05-9b192d9bee59"
  ),
 )
);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}



}


else
{
  echo json_encode(['code'=>'500','status'=>'failed','message'=>'Invalid Token.','data'=>null]);
}


?>
