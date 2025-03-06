<?php
include __DIR__ . '/../includes/autoload.php';

$uri = strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?');

$SjrealWebsite = new \project\SjrealWebiste;
$entryPoint = new \Ninja\EntryPoint($SjrealWebsite);
$entryPoint->run($uri, $_SERVER['REQUEST_METHOD']);