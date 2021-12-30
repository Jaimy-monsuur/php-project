<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require __DIR__ . '/../patternrouter.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);