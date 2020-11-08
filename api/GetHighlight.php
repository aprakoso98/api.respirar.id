<?php
// $debug = true;
$columns = 'name, image, redirect, btnText';
if (checkIfKeyExist($PostData, ["forCms"])) {
	$data = $db->ExecuteAll("SELECT * FROM tb_highlight_home ORDER BY position ASC", []);
} else {
	$data = $db->ExecuteAll("SELECT $columns FROM tb_highlight_home WHERE tb_highlight_home.visible=? ORDER BY position ASC", [1]);
}
$response->Success($data);
