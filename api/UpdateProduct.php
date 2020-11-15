<?php
// $debug=true;
if (checkIfKeyExist($PostData, ['data'])) {
	$path = "$filePath/product/";
	$upload = new Upload(['folderPath' => $path]);
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	$sql = "";
	$sqlData = [];
	foreach ($PostData->data as $data) {
		$images = ['image', 'image2', 'image3', 'image4', 'image5', 'image6'];
		$keys = ['productName', 'productUrl', 'sku', 'kategori', 'availability', 'shortDescription', 'description', 'sizes', 'prices', 'marketplaces'];
		$query = "";
		$dataImage = [];
		$dataQuery = [];
		if (checkIfKeyExist($data, ['id'])) {
			if ($data->deleted) {
				$query = 'DELETE FROM tb_product WHERE id=?';
				$dataQuery = [$data->id];
			} else {
				$keys = array_map(function ($k) {
					return $k . "=?";
				}, $keys);
				for ($i = 0; $i < count($images); $i++) {
					$key = $images[$i];
					if (isset($data->$key) && strlen($data->$key) > 100) {
						$image = $upload->base64_to_file($data->$key);
						array_push($dataImage, '/product/' . $image);
						array_push($keys, $key . "=?");
					}
				}
				$queryKeys = join(', ', $keys);
				$dataQuery = array_merge([$data->productName, $data->productUrl, $data->sku, $data->kategori, $data->availability, $data->shortDescription, $data->description, $data->sizes, $data->prices, $data->marketplaces], $dataImage, [$data->id]);
				$sql .= "UPDATE tb_product SET $queryKeys WHERE id=?;";
				$sqlData = array_merge($sqlData, $dataQuery);
			}
		} else {
			if (!$data->deleted) {
				$questionMark = array_map(function () {
					return "?";
				}, $keys);
				for ($i = 0; $i < count($images); $i++) {
					$key = $images[$i];
					if (isset($data->$key) && strlen($data->$key) > 100) {
						$image = $upload->base64_to_file($data->$key);
						array_push($dataImage, '/product/' . $image);
						array_push($keys, $key);
						array_push($questionMark, "?");
					}
				}
				$queryKeys = join(', ', $keys);
				$queryQuestion = join(',', $questionMark);
				$dataQuery = array_merge([$data->productName, $data->productUrl, $data->sku, $data->kategori, $data->availability, $data->shortDescription, $data->description, $data->sizes, $data->prices, $data->marketplaces], $dataImage);
				$sql .= "INSERT INTO tb_product ($queryKeys) VALUES ($queryQuestion);";
				$sqlData = array_merge($sqlData, $dataQuery);
			}
		}
	}
	// $response->Error([$sql, $sqlData]);
	$db->Execute($sql, $sqlData);
	$err = $db->error();
	if ($err[2]) {
		$response->Error($err[2]);
	} else {
		$response->Success('Success');
	}
} else {
	$response->Error('Please check parameters');
}
