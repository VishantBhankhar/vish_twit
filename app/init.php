<?php

session_start();

require_once 'vendor/autoload.php';
require_once 'classes/auth.php';

\Codebird\Codebird::setConsumerKey('JJRkcJSwzl7fAAdvJaXEvadbq','RB3UZ64hpnqGS2wIVkjlYQyQCyXd3089BUWQIReEfY8NEihQXu');
$client = \Codebird\Codebird::getInstance();

