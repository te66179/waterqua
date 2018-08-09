 <?php
  
function send_LINE($msg){
 $access_token = '9V0ilgaZpGuc6Ywwnm3Er6ogwGcZ4ikYn1JMPt4pTDRLoz+F8qGQqJb3riiO3mixc9lKFGBkXc4vE/tv97bjigKMgqkAYLffV7qULxM24Bkb3yNFAha7q36zZsYAVH9KClTNMuWAbPK2is+dz73agQdB04t89/1O/w1cDnyilFU=
'; 
  $messages = [
        'type' => 'text',
        'text' => $msg
        //'text' => $text
      ];
      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => 'Ue77a191627f6ac91899e75d92264310c',
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n"; 
}
?>
