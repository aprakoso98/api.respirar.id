<?php
if (checkIfKeyExist($PostData, ['data'])) {
	$path = "$filePath/about/";
	$upload = new Upload(['folderPath' => $path]);
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	foreach ($PostData->data as $data) {
		if (checkIfKeyExist($data, ['id'])) {
			if ($data->deleted) {
				$db->Execute('DELETE FROM tb_about WHERE id=?', [$data->id]);
			} else {
				$image = $data->image;
				if ($data->uploadedNewImage) {
					$image = $upload->base64_to_file($data->image);
					$image = '/about/' . $image;
				}
				$db->Execute('UPDATE tb_about SET headline=?, tb_about.image=?, tb_about.description=? WHERE id=?', [$data->headline, $image, $data->description, $data->id]);
			}
		} else {
			$image = $upload->base64_to_file($data->image);
			$image = '/about/' . $image;
			$db->Execute('INSERT INTO tb_about (headline, tb_about.image, tb_about.description) VALUES (?,?,?)', [$data->headline, $image, $data->description]);
		}
	}
	$response->Success("Success update about");
} else {
	$response->Error('Please check parameters');
}
