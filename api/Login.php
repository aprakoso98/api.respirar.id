<?php
if (checkIfKeyExist($PostData, ['username', 'password'])) {
	$data = $db->Execute("SELECT id FROM tb_user WHERE username=? AND tb_user.password=?", [$PostData->username, $PostData->password]);
	if ($data) {
		$startDate = time();
		$expired = date('Y-m-d H:i:s', strtotime('+1 day', $startDate));
		$token = md5(time());
		$db->Execute("UPDATE tb_user SET token=?, expired=? WHERE id=?", [$token, $expired, $data->id]);
		$err = $db->error();
		if ($err[2]) {
			$response->Error($err[2]);
		} else {
			$response->Success(['token' => $token, 'expired' => $expired]);
		}
	} else {
		$response->Error("Data tidak ditemukan, silahkan cek username atau password Anda");
	}
} else {
	$response->Error("Please Check Parameters");
}
