<?php
if (checkIfKeyExist($PostData, ["target", "data"])) {
	$table = "tb_$PostData->target";
	$isTableExist = $db->Execute("SHOW TABLES LIKE '$table'");
	if ($isTableExist) {
		$ids = [];
		$cases = [];
		foreach ($PostData->data as $id => $data) {
			array_push($ids, "'$id'");
			array_push($cases, "'$id' THEN '$data'");
		}
		$ids = join(",", $ids);
		$cases = join(" WHEN id=", $cases);
		$query = "UPDATE $table SET position = (CASE WHEN id=$cases END) WHERE id in ($ids)";
		$data = $db->Execute($query, []);
		$err = $db->error();
		if ($err[2]) {
			$response->Error($err[2]);
		} else {
			$response->Success("Gagal ubah urutan");
		}
	} else {
		$response->Error("Gagal ubah urutan");
	}
} else {
	$response->Error("Please Check Parameters");
}
