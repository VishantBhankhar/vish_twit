
<?php

require_once 'app/init.php';
$auth = new auth($client);
$headerText = "Twiter Login";
    $userid = $auth->getUserId();
    $username = $auth->getUserName();
    $tweetsHome = $auth->getHomeTimeline();
    $filename = $userid.'.json';
    header("Content-type: text/json");
    header("Content-Disposition: attachment; filename=$filename");;

echo print_r($tweetsHome, true);

/**
 * Created by PhpStorm.
 * User: V_the_K!nG
 * Date: 8/16/2017
 * Time: 7:47 PM
 */