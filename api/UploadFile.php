<?php

if (checkIfKeyExist($PostData, ["file"])) {
	$rootPath = 'files';
	$path = sprintf('/%s', $PostData->path ? $PostData->path : '');
	$targetPath = sprintf('%s%s', $rootPath, $path);
	$upload = new Upload(['folderPath' => $targetPath]);
	if (!is_dir($targetPath)) {
		mkdir($targetPath, 0777, true);
	}
	$file = $upload->base64_to_file($PostData->file, gen_uuid(), true);
	$response->Success([
		'name' => $file[0],
		'format' => $file[1],
		'path' => $path,
		'fullname' => sprintf('%s%s', $path, $file[0])
	]);
} else {
	$response->Error('Please check parameters');
}
