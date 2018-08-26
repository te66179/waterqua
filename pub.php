<?php
 

  function pubMqtt($topic,$msg){
       
      put("https://api.netpie.io/topic/waterquality/$topic?retain",$msg);
 
  }
  function getMqttfromlineMsg($lineMsg){
 
    $pos = strpos($lineMsg, ":");
    if($pos){
      $splitMsg = explode(":", $lineMsg);
      $topic = $splitMsg[0];
      $msg = $splitMsg[1];
      pubMqtt($topic,$msg);
    }else{
      $topic = "raw";
      $msg = $lineMsg;
      pubMqtt($topic,$msg);
    }
  }
 
function put($url,$tmsg)
{
      
    $ch = curl_init($url);
 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $tmsg);
 
    curl_setopt($ch, CURLOPT_USERPWD, "3YO3j9KH6YNAAo6:FwHcEoD8ivnsAgc9mjbytXuEi");
     
    $response = curl_exec($ch);
     
    curl_close ($ch);
     
    return $response;
}
 
?>