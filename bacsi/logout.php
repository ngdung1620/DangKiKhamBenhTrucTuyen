<?php
  session_start();
  require_once('../db/dbhelper.php');
  require_once('../utils/uitility.php');
   
   $token = getCOOKIE('token3');
   if (empty($token)) {
     header('Location: login.php');
     die();
   }
   
   // Xoa token khoi database
   $sql = "delete from login_tokens where token = '$token'";
   execute($sql);
   
   // Xoa token khoi cookie
   setcookie('token3', '', time()-7*24*60*60, '/');
   session_destroy();
   header('Location: login.php');
   die();

