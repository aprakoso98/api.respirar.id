<?php
if (checkIfKeyExist($PostData, ['data'])) {
	$path = 'files/product/';
	$upload = new Upload(['folderPath' => $path]);
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	foreach ($PostData->data as $data) {
		if (checkIfKeyExist($data, ['id'])) {
			if ($data->deleted) {
				$db->Execute('DELETE FROM tb_product WHERE id=?', [$data->id]);
			} else {
				$image = $data->image;
				if ($data->uploadedNewImage) {
					$image = $upload->base64_to_file($data->image);
					$image = '/product/' . $image;
				}
				$db->Execute('UPDATE tb_product SET productName=?, productUrl=?, sku=?, availability=?, shortDescription=?, description=?, image=?, sizes=?, prices=?, marketplaces=? WHERE id=?', [$data->productName, $data->productUrl, $data->sku, $data->availability, $data->shortDescription, $data->description, $image, $data->sizes, $data->prices, $data->marketplaces, $data->id]);
			}
		} else {
			$image = $upload->base64_to_file($data->image);
			$image = '/product/' . $image;
			$db->Execute('INSERT INTO tb_product (productName, productUrl, sku, availability, shortDescription, description, image, sizes, prices, marketplaces) VALUES (?,?,?,?,?,?,?,?,?,?)', [$data->productName, $data->productUrl, $data->sku, $data->availability, $data->shortDescription, $data->description, $image, $data->sizes, $data->prices, $data->marketplaces]);
		}
	}
	$response->Success("Success update about");
} else {
	$response->Error('Please check parameters');
}
