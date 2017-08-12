<?php
require_once 'php/init.php';

$auth = new auth($client);

echo $auth->getAuthUrl();
