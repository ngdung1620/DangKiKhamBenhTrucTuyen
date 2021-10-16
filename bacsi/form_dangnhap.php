<?php
require_once('../db/dbhelper.php');
require_once('../utils/uitility.php');
 $email = $password = '';
 if(!empty($_POST)) {
   $email = getPOST('email');
   $password = getPOST('password');
   $sql    = "select * from bacsi where email = '$email' and password = '$password'";
	$result = executeResult($sql,true);
	if ($result != null && count($result) > 0) {
		//login success
		$email = $result['email'];
		$id    = $result['id'];
		$token = getPwdSecurity($email.time().$id);
		// setcookie('status', 'login', time()+7*24*60*60, '/');
		setcookie('token3', $token, time()+7*24*60*60, '/');
		// save database
		$sql = "insert into login_tokens (id_user, token) values ('$id', '$token')";
		execute($sql);
		$res = [
			"status" => 1,
		];
 }else {
	 $res = [
		 "status" => -1,
	 ];
 }
 echo json_encode($res);
}
