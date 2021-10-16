<?php
 session_start();
  require_once('../db/dbhelper.php');
  require_once('../utils/uitility.php');
  $result = validateToken('nhanvien','token2');
  if($result != null) {
    header('location:./index.php');
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bệnh viện da khoa Tâm Đức</title>
    <link rel="stylesheet" href="dangki_dangnhap.css" />
  </head>
  <body>
    <form method="post" class= 'form__login'>
      <div class="container">
        <h1>Bệnh viện đa khoa Tâm Đức</h1>
        <h2 class="head">Đăng nhập cho nhân viên</h2>
        <input
          type="text"
          class="tkmk text-white"
          required
          placeholder="Nhập Email"
          name="email"
        />
        <input
          type="password"
          class="tkmk text-white"
          required
          placeholder="Nhập mật khẩu"
          name="password"
        />
        <input type="submit" class="submit" value="Đăng nhập" />
        <br />
      </div>
    </form>
    <script src='../asset/js/jquery.min.js'></script>
    <script>
      $(document).ready(function() {
        $('.form__login').submit(function(e){
          e.preventDefault();
            const email = $('input[name="email"]').val();
            const password = $('input[name="password"]').val();
            $.post('./form_dangnhap.php', { 'email': email, 'password': password},function(data){
                var obj = JSON.parse(data);
                if(obj.status === 1) {
                  window.open('index.php','_self')
                }else {
                 alert('Tài khoản hoặc Mật khẩu không đúng !!');
                  window.location.reload();
                }
            })
        })
      })
    </script>
  </body>
</html>
