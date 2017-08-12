<?php
require_once 'app/init.php';

$auth = new auth($client);

if($auth->signedIn())
{
    header('Location: index.app');
}
else{
    die('Sign in failed');
}