<?php
if (checkIfKeyExist($PostData, [])) {
	$data = $db->ExecuteAll("SELECT * FROM tb_marketplace", []);
	$response->Success($data);
} else {
	$response->Error("Please Check Parameters");
}
