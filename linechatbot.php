[code] <?php
require(“vendor/autoload.php”);
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;

require(“phpMQTT.php”);

$mqtt = new phpMQTT(“https://water01.herokuapp.com”, 1883, “phpMQTT Pub Example”); 

$token = “9V0ilgaZpGuc6Ywwnm3Er6ogwGcZ4ikYn1JMPt4pTDRLoz+F8qGQqJb3riiO3mixc9lKFGBkXc4vE/tv97bjigKMgqkAYLffV7qULxM24Bkb3yNFAha7q36zZsYAVH9KClTNMuWAbPK2is+dz73agQdB04t89/1O/w1cDnyilFU=
”;

$httpClient = new CurlHTTPClient($token);
$bot = new LINEBot($httpClient, [‘channelSecret’ => $token]);
// webhook
$jsonStr = file_get_contents(‘php://input’);
$jsonObj = json_decode($jsonStr);
print_r($jsonStr);
foreach ($jsonObj->events as $event) {
if(‘message’ == $event->type){
// debug
//file_put_contents(“message.json”, json_encode($event));
$text = $event->message->text;

if (preg_match(“/สวัสดี/”, $text)) {
$text = “มีอะไรให้จ่าวิสรับใช้ครับ”;
}

if (preg_match(“/Ph/”, $text))
{
  if ($mqtt->connect()) 
  {
    $mqtt->publish(“/ESP/REMOTE”,$text);
    $mqtt->close();
  }
  $text = “ใส่ค่า Ph ให้แล้วครับ”;
}
if (preg_match(“/Cl/”, $text)
{
  if ($mqtt->connect()) 
  {
    $mqtt->publish(“/ESP/REMOTE”,$text);
    $mqtt->close();
  }
  $text = “ใส่ค่าคลอลีนให้แล้วครับ”;
}
if (preg_match(“/ความขุ่น/”, $text)
{
  if ($mqtt->connect()) 
  {
    $mqtt->publish(“/ESP/REMOTE”,text);
    $mqtt->close();
  }
  $text = “ใส่ค่าความขุ่นให้แล้วครับ”;
}
$response = $bot->replyText($event->replyToken, $text);

}
}

?>
[/code]
