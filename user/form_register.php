<?php
require_once('../db/dbhelper.php');
require_once('../utils/uitility.php');
$fullName = $email = $address = $password = $gender = $date = '';
if(!empty($_POST)) {
  $fullName = getPOST('fullName');
  $email = getPOST('email');
  $address = getPOST('address');
  $password = getPOST('password');
  $gender = getPOST('gender');
  $date = getPOST('date');
  if ($fullName != '' && $password != '' && $email != '' && $address != '' && $gender != '' && $date != '') {
      $sql = "insert into users (fullName, password, email, date, address,gender) values ('$fullName', '$password', '$email', '$date', '$address',$gender)";
      execute($sql);
      header('Location: login.php');
      die();
	}
}