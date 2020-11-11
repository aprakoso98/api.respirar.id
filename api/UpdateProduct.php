<?php
if (checkIfKeyExist($PostData, ['data'])) {
	$path = "$filePath/product/";
	$upload = new Upload(['folderPath' => $path]);
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	foreach ($PostData->data as $data) {
		$images = ['image', 'image2', 'image3', 'image4', 'image5'];
		$keys = ['productName', 'productUrl', 'sku', 'availability', 'shortDescriptio', 'description', 'sizes', 'prices', 'marketplaces'];
		$dataImage = [];
		if (checkIfKeyExist($data, ['id'])) {
			if ($data->deleted) {
				$db->Execute('DELETE FROM tb_product WHERE id=?', [$data->id]);
			} else {
				foreach ($key as $images) {
					if ($data[$key] && strlen($data[$key]) > 100) {
						$image = $upload->base64_to_file($data->image);
						array_push($dataImage, '/product/' . $image);
						array_push($keys, $key . "=?");
					}
				}
				$queryKeys = join(', ', $keys);
				$queryData = array_merge([$data->productName, $data->productUrl, $data->sku, $data->availability, $data->shortDescription, $data->description, $data->sizes, $data->prices, $data->marketplaces], $dataImage, [$data->id]);
				$db->Execute('UPDATE tb_product SET $queryKeys WHERE id=?', $queryData);
			}
		} else {
			$questionMark = [];
			foreach ($key as $images) {
				if ($data[$key] && strlen($data[$key]) > 100) {
					$image = $upload->base64_to_file($data->image);
					array_push($dataImage, '/product/' . $image);
					array_push($keys, $key);
					array_push($questionMark, "?");
				}
			}
			$queryKeys = join(', ', $keys);
			$queryQuestion = join(',', $questionMark);
			$queryData = array_merge([$data->productName, $data->productUrl, $data->sku, $data->availability, $data->shortDescription, $data->description, $data->sizes, $data->prices, $data->marketplaces], $dataImage);
			$db->Execute('UPDATE tb_product SET $queryKeys WHERE id=?', $queryData);
			$db->Execute("INSERT INTO tb_product ($keys) VALUES ($queryQuestion)", $queryData);
		}
	}
	$response->Success("Success update product");
} else {
	$response->Error('Please check parameters');
}
