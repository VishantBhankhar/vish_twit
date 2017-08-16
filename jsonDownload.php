
<?php

require_once './app/init.php';
$client->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$twit = (array)$client->statuses_homeTimeline();
$headerText = "Twiter Login";
    $filename = $_SESSION['user-id'].'.json';
    header("Content-type: text/json");
    header("Content-Disposition: attachment; filename=$filename");

echo print_r($twits, true);

/**
 * Created by PhpStorm.
 * User: V_the_K!nG
 * Date: 8/16/2017
 * Time: 7:47 PM
 */