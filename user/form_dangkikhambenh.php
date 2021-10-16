<?php
  require_once('../db/dbhelper.php');
  require_once('../utils/uitility.php');
  $fullName = $email = $address = $phoneNumber = $date = $gender = $benhKham ;
  if(!empty($_POST)) {
    $fullName = getPOST('fullName');
    $email = getPOST('email');
    $address = getPOST('address');
    $benhKham = getPOST('benhKham');
    $gender = getPOST('gender');
    $date = getPOST('date');
    $phoneNumber = getPOST('phoneNumber');
    if ($fullName != '' && $phoneNumber != '' && $email != '' && $address != '' && $gender != '' && $date != '' && $benhKham != '') {
        $sql = "insert into donkhambenh (fullName, phoneNumber, email, date, address,gender,benhkham,id_user) values ('$fullName', '$phoneNumber', '$email', '$date', '$address',$gender,'$benhKham','$id_user')";
        execute($sql);
        $sql = "insert into donchopheduyet (fullName, phoneNumber, email, date, address,gender,benhkham,id_user) values ('$fullName', '$phoneNumber', '$email', '$date', '$address',$gender,'$benhKham','$id_user')";
        execute($sql);
        header('Location: index.php');
        die();
    }
  } 
