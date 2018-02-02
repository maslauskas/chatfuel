<?php

$token = "CHATFUEL_TOKEN";
$botID = "CHATFUEL_BOT_ID";
$blockID = "CHATFUEL_BLOCK_ID";
$fbMessengerID = "FB_MESSENGER_ID";

$url = 'https://api.chatfuel.com/bots/' . $botId .'/users/' . $fbMessengerID . '/send?';

$data = array(
    'chatfuel_token' => $token,
    'chatfuel_block_id' => $blockID,
);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $url . http_build_query($data),
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
    ),
));

curl_exec($curl);