<?php
require_once 'php/init.php';

$auth = new auth($client);

if($auth->signedIn())
{
    header('Location: index.php');
}
else{
    die('Sign in failed');
}