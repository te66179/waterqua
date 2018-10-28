 <?php
  
function send_LINE($msg){
 $access_token = 'iGDxZmG08RKEvQYAvVsWEHXUiVpi1oQTrtgJntiKIz/Oxd7WFbEHNhc8YP6acrHlc9lKFGBkXc4vE/tv97bjigKMgqkAYLffV7qULxM24BmWHZmmd72KO5KOxW5wKhwwv3hQ1j5OSEJd/MPHJ+khDgdB04t89/1O/w1cDnyilFU='; 
 $arrayHeader = array();
 $arrayHeader[] = "Content-Type: application/json";
 $arrayHeader[] = "Authorization: Bearer {$accessToken}";
 $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
 $arrayPostData['messages'][0]['type'] = "text";
 $arrayPostData['messages'][0]['text'] = $msg;
 replyMsg($arrayHeader,$arrayPostData);

 function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
        echo $result . "\r\n";
    }
}
?>
