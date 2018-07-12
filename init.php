<?php
/**
 * Created by PhpStorm.
 * User: s.byadretdinov
 * Date: 18.12.2017
 * Time: 17:50
 */
include ('vendor/autoload.php');
include ('TelegramBot.php');
include('Weather.php');

$telegramApi = new TelegramBot();
$weatherApi = new Weather();

while (true){
    sleep(2);
    $updates = $telegramApi->getUpdates();

    foreach($updates as $update){
        if(!isset($update->message->location)){
           $result = $weatherApi->getWeather($update->message->location->latitude, $update->message->location->longitude);
            $telegramApi->sendMessage($update->message->chat->id, json_encode($result));
        } else {
            $telegramApi->sendMessage($update->message->chat->id, 'Ну Привет, чо!');
        }

    }
}