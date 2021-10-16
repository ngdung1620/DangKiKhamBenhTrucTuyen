<?php
function getPwdSecurity($pwd) {
	return md5(md5($pwd).MD5_PRIVATE_KEY);
}

function validateToken($user = 'user',$tk = 'token') {
	// giúp cho việc kết nối database được bỏ qua
	// hãy gọi session_start();
	if(isset($_SESSION[$user])){
		return $_SESSION[$user];
	}

	$token = '';
	if (isset($_COOKIE[$tk])) {
		$token = $_COOKIE[$tk];
		$sql   = "select * from login_tokens where token = '$token'";
		$data  = executeResult($sql);
		if ($data != null && count($data) > 0) {
			// lưu thông tin trên session nó được lưu trữ trên server nên không sợ mất.
				$_SESSION[$user] = $data[0];
			return $data[0];
		}
	}

	return null;
}

function getGET($key) {
	$value = '';
	if (isset($_GET[$key])) {
		$value = $_GET[$key];
	}
	$value = fixSqlInjection($value);
	return $value;
}

function getPOST($key) {
	$value = '';
	if (isset($_POST[$key])) {
		$value = $_POST[$key];
	}
	$value = fixSqlInjection($value);
	return $value;
}
function getCOOKIE($key) {
	$value = '';
	if (isset($_COOKIE[$key])) {
		$value = $_COOKIE[$key];
	}
	return fixSqlInjection($value);
}
function fixSqlInjection($str) {
	$str = str_replace("\\", "\\\\", $str);
	$str = str_replace("'", "\'", $str);
	return $str;
}