<?php
// $debug = true;
if (checkIfKeyExist($PostData, ['type'])) {
	$path = "$filePath/highlight/";
	$upload = new Upload(['folderPath' => $path]);
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	if ($PostData->type === 'insert' && checkIfKeyExist($PostData, ['data'])) {
		foreach ($PostData->data as $file) {
			$image = "/highlight/" . $upload->base64_to_file($file->file);
			$db->Execute("INSERT INTO tb_highlight_home (image) VALUES (?)", [$image]);
		}
		$response->Success("Sukses tambah highlight");
	} else if ($PostData->type === 'delete' && checkIfKeyExist($PostData, ['id'])) {
		$db->Execute("DELETE FROM tb_highlight_home WHERE id=?", [$PostData->id]);
		$response->Success("Sukses hapus highlight");
	} else if ($PostData->type === 'toggle' && checkIfKeyExist($PostData, ['id', 'visible'])) {
		$hide = $PostData->visible === '1' ? 0 : 1;
		$hideText = $hide === 1 ? 'visible' : 'hide';
		$db->Execute("UPDATE tb_highlight_home SET visible=? WHERE id=?", [$hide, $PostData->id]);
		$response->Success("Sukses $hideText highlight");
	} else if ($PostData->type === 'change' && checkIfKeyExist($PostData, ['id', 'target', 'value'])) {
		$db->Execute("UPDATE tb_highlight_home SET $PostData->target=? WHERE id=?", [$PostData->value, $PostData->id]);
		$response->Success("Sukses update $PostData->target");
	} else {
		$response->Error("Please check parameters");
	}
} else {
	$response->Error("Please check parameters");
}
