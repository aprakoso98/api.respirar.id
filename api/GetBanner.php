<?php
// $debug = true;
if (checkIfKeyExist($PostData, [])) {
	$data = $db->ExecuteAll("SELECT * FROM tb_banner ORDER BY position", []);
	$response->Success($data);
} else {
	$response->Error("Please check parameters");
}
