<?php

use Cerbero\Authenticator\Application;

require '../vendor/autoload.php';

session_start();

$application = new Application();
$application->route();
