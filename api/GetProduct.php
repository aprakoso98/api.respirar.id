<?php
if (checkIfKeyExist($PostData, [])) {
	$columns = "id, productName, kategori, productUrl, sku, availability, shortDescription, description, image, image2, image3, image4, image5, image6, sizes, prices, marketplaces";
	if ($PostData->isKategori) {
		$data = $db->ExecuteAll('SELECT kategori FROM tb_product GROUP BY kategori');
		$response->Success($data);
	} else if ($PostData->productUrl) {
		$data = $db->Execute("SELECT $columns FROM tb_product WHERE productUrl=?", [$PostData->productUrl]);
		if ($data) {
			$response->Success($data);
		} else {
			$response->Error("Data tidak ditemukan");
		}
	} else if (checkIfKeyExist($PostData, ['highlight'])) {
		$data = $db->ExecuteAll("SELECT $columns FROM tb_product WHERE isHighlighted=? ORDER BY highLightIndex ASC", [1]);
		$response->Success($data);
	} else if (checkIfKeyExist($PostData, ['search'])) {
		$data = $db->ExecuteAll("SELECT $columns FROM tb_product WHERE productName LIKE '%$PostData->search%'", []);
		$response->Success($data);
	} else {
		$data = $db->ExecuteAll("SELECT $columns FROM tb_product", []);
		$response->Success($data);
	}
} else {
	$response->Error("Please Check Parameters");
}
