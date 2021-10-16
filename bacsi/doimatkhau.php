<?php
  session_start();
  require_once('../db/dbhelper.php');
  require_once('../utils/uitility.php');
  $result = validateToken('bacsi','token3');
  if($result === null) {
    header('location:./login.php');
    die();
  }
  $id = '';
  $id = $result['id_user'];
  $sql = "select * from bacsi where id ='$id'";
  $data = executeResult($sql,true);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./doimatkhau.css" />
    <title>Đăng kí khám bệnh online</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <form action="" class="form">
        <h1 class="head">Đổi mật khẩu</h1>
        <input
          type="password"
          class="tkmk"
          required
          placeholder="Nhập mật khẩu mới"
          name="newPassword"
        />
        <input
          type="password"
          class="tkmk"
          required
          placeholder="Nhập lại mật khẩu"
          name="lNewPassword"
        />
        <button class="btn">Thay đổi</button>
      </form>
    </div>
    <script src='../asset/js/jquery.min.js'></script>
    <script>
      $(document).ready(function() {
        $('.form').submit(function(e){
          e.preventDefault();
            const oldPassword = $('input[name="oldPassword"]').val();
            const newPassword = $('input[name="newPassword"]').val();
            const lNewPassword = $('input[name="lNewPassword"]').val(); 
            const id = <?=$id?>;
            if (newPassword != lNewPassword) {
            alert("Mật khẩu không khớp!!! Vui lòng nhập lại!!");
            return false;
          }
            $.post('./form_doimatkhau.php', 
            { 
              'id':id,
              'newPassword': newPassword,
              'lNewPassword': lNewPassword
            },function(data){
              alert('Đổi mật khẩu thành công!!');
              window.open('./index.php', '_self');
            })
            
        })
      })
    </script>
  </body>
</html>
