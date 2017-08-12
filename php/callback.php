<?php
require_once 'init.php';

$auth = new auth($client);

if($auth->signedIn())
{
    header('Location: index.php');
}
else{
    die('Sign in failed');
}