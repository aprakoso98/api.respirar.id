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
		if (preg_match('/Get\w+/', $action)) {
			require "api/$filename";
		} else {
			// if (checkIfKeyExist($header, ['Authorization'])) {
			require "api/$filename";
			// } else {
			// 	$response->Error('Not authorization');
			// }
		}
		break;
	}
	if (!$found) {
		$response->Error("Required action", "E0002");
	}
}
