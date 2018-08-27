<?php
$access_token = 'iGDxZmG08RKEvQYAvVsWEHXUiVpi1oQTrtgJntiKIz/Oxd7WFbEHNhc8YP6acrHlc9lKFGBkXc4vE/tv97bjigKMgqkAYLffV7qULxM24BmWHZmmd72KO5KOxW5wKhwwv3hQ1j5OSEJd/MPHJ+khDgdB04t89/1O/w1cDnyilFU=
';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
