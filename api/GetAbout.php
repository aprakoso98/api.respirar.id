<?php
if (checkIfKeyExist($PostData, [])) {
	$data = $db->ExecuteAll("SELECT * FROM tb_about ORDER BY position ASC", []);
	$response->Success($data);
} else {
	$response->Error("Please Check Parameters");
}
