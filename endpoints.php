<?php
// error_reporting(0);
// $debug = true;

$files = scandir(__DIR__ . $path . "/api");
$files = array_diff($files, ['.', '..']);

$found = false;
foreach ($files as $key => $filename) {
	$action = str_replace(".php", "", $filename);
	if ($PostData->action === $action) {
		$found = true;
		require "api/$filename";
		break;
	}
	if (!$found) {
		$response->Error("Required action", "E0002");
	}
}