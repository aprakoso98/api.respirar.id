<?php
// $debug = true;
if (checkIfKeyExist($PostData, ["key"])) {
	$data = $db->ExecuteAll("SELECT * FROM tb_info WHERE tb_info.key=? ORDER BY tb_info.key ASC, tb_info.type ASC", [$PostData->key]);
	$response->Success($data);
} else if (checkIfKeyExist($PostData, ["keys"])) {
	$in  = str_repeat('?,', count($PostData->keys) - 1) . '?';
	$data = $db->ExecuteAll("SELECT * FROM tb_info WHERE tb_info.key IN ($in) ORDER BY tb_info.key ASC, tb_info.type ASC", $PostData->keys);
	$response->Success($data);
} else {
	$data = $db->ExecuteAll("SELECT * FROM tb_info ORDER BY tb_info.key ASC, tb_info.type ASC", []);
	$response->Success($data);
}
