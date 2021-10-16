<?php
require_once('../db/dbhelper.php');
require_once('../utils/uitility.php');
$newPassword=  $lNewPassword = $id = '';
if(!empty($_POST)){
  $newPassword = getPOST('newPassword');
  $lNewPassword = getPOST('lNewPassword');
  $id = getPOST('id');

  $sql = "update nhanvien set password = '$newPassword' where id = '$id'";
  execute($sql);   
}
