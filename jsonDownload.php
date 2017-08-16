
<?php

require_once './app/init.php';
$auth = new auth($client);
$headerText = "Twiter Login";
    $tweets = $auth->statuses_homeTimeline();
    $filename = $_SESSION['user-id'].'.json';
    header("Content-type: text/json");
    header("Content-Disposition: attachment; filename=$filename");

echo print_r($tweets, true);

/**
 * Created by PhpStorm.
 * User: V_the_K!nG
 * Date: 8/16/2017
 * Time: 7:47 PM
 */