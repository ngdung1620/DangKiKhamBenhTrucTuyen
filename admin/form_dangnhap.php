<?php
require_once('../db/dbhelper.php');
require_once('../utils/uitility.php');
 $account = $password = '';
 if(!empty($_POST)) {
   $account = getPOST('account');
   $password = getPOST('password');
   $sql    = "select * from admin where account = '$account' and password = '$password'";
	$result = executeResult($sql,true);
	if ($result != null && count($result) > 0) {
		//login success
		$account = $result['account'];
		$id    = $result['id'];
		$token = getPwdSecurity($account.time().$id);
		// setcookie('status', 'login', time()+7*24*60*60, '/');
		setcookie('token1', $token, time()+7*24*60*60, '/');
		// save database
		$sql = "insert into login_tokens (id_user, token) values ('$id', '$token')";
		execute($sql);
		$res = [
			"status" => 1,
		];
 }else {
	$res =[
		"status" => -1
	];
 }
 echo json_encode($res);
}
