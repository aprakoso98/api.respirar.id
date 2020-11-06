<?php
// $debug = true;
if (checkIfKeyExist($PostData, ['type'])) {
	$path = 'files/banner/';
	$upload = new Upload(['folderPath' => $path]);
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	if ('insert' && checkIfKeyExist($PostData, ['data'])) {
		foreach ($PostData->data as $file) {
			$image = "/banner/" . $upload->base64_to_file($file->file);
			$db->Execute("INSERT INTO tb_banner (image) VALUES (?)", [$image]);
		}
		$response->Success("Sukses tambah banner");
	} else if ($PostData->type === 'delete' && checkIfKeyExist($PostData, ['id'])) {
		$db->Execute("DELETE FROM tb_banner WHERE id=?", [$PostData->id]);
		$response->Success("Sukses hapus banner");
	} else if ($PostData->type === 'toggle' && checkIfKeyExist($PostData, ['id', 'visible'])) {
		$hide = $PostData->visible === '1' ? 0 : 1;
		$hideText = $hide === 1 ? 'visible' : 'hide';
		$db->Execute("UPDATE tb_banner SET visible=? WHERE id=?", [$hide, $PostData->id]);
		$response->Success("Sukses $hideText banner");
	} else if ($PostData->type === 'change' && checkIfKeyExist($PostData, ['id', 'target', 'value'])) {
		$db->Execute("UPDATE tb_banner SET $PostData->target=? WHERE id=?", [$PostData->value, $PostData->id]);
		$response->Success($db->error());
	} else {
		$response->Error("Please check parameters");
	}
} else {
	$response->Error("Please check parameters");
}
