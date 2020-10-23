<?php
// $debug = true;
if (checkIfKeyExist($PostData, ["key"])) {
	$data = $db->ExecuteAll("SELECT * FROM tb_info WHERE tb_info.key=?", [$PostData->key]);
	$response->Success($data);
} else if (checkIfKeyExist($PostData, ["keys"])) {
	$in  = str_repeat('?,', count($PostData->keys) - 1) . '?';
	$data = $db->ExecuteAll("SELECT * FROM tb_info WHERE tb_info.key IN ($in)", $PostData->keys);
	$response->Success($data);
} else {
	$data = $db->ExecuteAll("SELECT * FROM tb_info", []);
	$response->Success($data);
}
