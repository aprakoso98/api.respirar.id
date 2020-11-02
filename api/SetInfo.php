<?php
// $debug = true;
if (checkIfKeyExist($PostData, ["data"])) {
	$keys = [];
	$array = [];
	foreach ($PostData->data as $data) {
		array_push($keys, "'$data->key'");
		array_push($array, "'$data->key' THEN '$data->detail'");
	}
	$keys = join(",", $keys);
	$array = join(" WHEN tb_info.key=", $array);
	$query = "UPDATE tb_info SET detail = (CASE WHEN tb_info.key=$array END) WHERE tb_info.key in ($keys)";
	$data = $db->Execute($query, []);
	$err = $db->error();
	if ($err[2]) {
		$response->Success($err[2]);
	} else {
		$response->Success("Sukses ubah info");
	}
} else {
	$response->Error("Please Check Parameters");
}
