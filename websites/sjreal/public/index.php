<?php
include __DIR__ . '/../includes/autoload.php';

$uri = strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?');

$SjrealWebsite = new \Project\SjrealWebsite;
$entryPoint = new \Framework\EntryPoint($SjrealWebsite);

$entryPoint->run($uri, $_SERVER['REQUEST_METHOD']);