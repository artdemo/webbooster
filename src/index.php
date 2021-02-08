<?php 
$route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');

require_once __DIR__ . '/classes/Entry.php';
require_once __DIR__ . '/classes/Routes.php';

$entry = new Entry(new Routes(), $route);
$entry->run();