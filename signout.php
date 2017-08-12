<?php

require_once 'app/init.php';

$auth = new auth($client);
$auth->signOut();

header('Location: index.php');





