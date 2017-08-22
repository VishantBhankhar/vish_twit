<?php

session_start();

require_once 'vendor/autoload.php';
require_once 'classes/auth.php';

\Codebird\Codebird::setConsumerKey('JJRkcJSwzl7fAAdvJaXEvadbq','RB3UZ64hpnqGS2wIVkjlYQyQCyXd3089BUWQIReEfY8NEihQXu');
$client = \Codebird\Codebird::getInstance();
$client -> setToken('896324447769997312-oDUR5ZXIjMdz3QnI5pjQuOZW2E9BRc3', 'cZf2DSjUqmErVNWTyf7ox7LKTKUcjK9UK415gyMbz3WzD');
