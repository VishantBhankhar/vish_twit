<?php

require_once './app/init.php';
$client->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$twit = (array)$client->statuses_homeTimeline();
$filename='csvData';
foreach ($twit as $row) {
    if (isset($row->created_at)) {
        $object = array(
            "created_at" => $row->created_at,
            "id" => strval($row->id),
            "text" => $row->text,
            "userid" => strval($row->user->id),
            "username" => $row->user->name,
            "userscreenname" => $row->user->screen_name,
            "userprofileurl" => $row->user->profile_image_url_https
        );
        array_push($result, $object);
    }
}
$filename = $userid . '.csv';
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=$filename");
$output = fopen("php://output", "w");
$header = array_keys($result[0]);
fputcsv($output, $header);
foreach ($result as $row) {
    fputcsv($output, $row);
}
fclose($output);

/**
 * Created by PhpStorm.
 * User: V_the_K!nG
 * Date: 8/18/2017
 * Time: 11:50 AM
 */