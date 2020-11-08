<?php
if (checkIfKeyExist($PostData, ['data'])) {
	$path = "$filePath/marketplaces/";
	$upload = new Upload(['folderPath' => $path]);
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	foreach ($PostData->data as $data) {
		if (checkIfKeyExist($data, ['id'])) {
			if ($data->deleted) {
				$db->Execute('DELETE FROM tb_marketplace WHERE id=?', [$data->id]);
			} else {
				$icon = $data->icon;
				if ($data->uploadedNewImage) {
					$icon = $upload->base64_to_file($data->icon);
					$icon = '/marketplaces/' . $icon;
				}
				$db->Execute('UPDATE tb_marketplace SET marketplaceName=?, icon=?, baseUrl=? WHERE id=?', [$data->marketplaceName, $icon, $data->baseUrl, $data->id]);
			}
		} else {
			$icon = $upload->base64_to_file($data->icon);
			$icon = '/marketplaces/' . $icon;
			$db->Execute('INSERT INTO tb_marketplace (marketplaceName, icon, baseUrl) VALUES (?,?,?)', [$data->marketplaceName, $icon, $data->baseUrl]);
		}
	}
	$response->Success("Success update marketplace");
} else {
	$response->Error('Please check parameters');
}
