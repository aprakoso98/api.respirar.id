<?php
error_reporting(0);
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 86400");

$path = "";

require $path . "./php-main/main.php";

$header = (object) apache_request_headers();
$PostData = postData_2();
$response = new OutputJSON();

$debug = false;

$filePath = '../files.respirar.id';
$dev = '{"host":"localhost","user":"root","pass":"","selectdb":"respirar_data"}';
$prod = '{"host":"localhost","user":"respirar_data","pass":"R3sp1r4r.1d","selectdb":"respirar_data"}';
if ($header->Host === '127.0.0.1') {
	$GLOBALS['config'] = json_decode(sprintf('{"db": %s}', $dev));
} else {
	$GLOBALS['config'] = json_decode(sprintf('{"db": %s}', $prod));
}

$db = new CRUD();

require $path . "./endpoints.php";

if (!$debug) {
	echo jsonify($response);
}
