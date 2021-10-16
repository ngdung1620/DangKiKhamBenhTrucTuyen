<?php
  session_start();
 require_once ('./form_register.php');
 require_once('../db/dbhelper.php');
  require_once('../utils/uitility.php');
  $result = validateToken();
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
    <title>Đăng kí khám bệnh online</title>
    <link rel="stylesheet" href="dangki_dangnhap.css" />
  </head>
  <body>
    <form method="post" id="RegisterForm">
      <div class="container">
        <h1 class="head ">Đăng kí tài khoản</h1>
        <input
          type="text"
          class="tkmk text-white"
          required
          placeholder="Tên đầy đủ"
          name="fullName"
        />
        <input
          type="text"
          class="tkmk text-white"
          required
          placeholder="Email"
          name="email"
        />
        <input
          type="text"
          class="tkmk text-white"
          required
          placeholder="Địa chỉ"
          name="address"
        />
        <input
          type="password"
          class="tkmk text-white"
          required
          placeholder="Mật khẩu"
          name="password"
          id="password"
        />
        <input
          type="password"
          class="tkmk text-white"
          required
          placeholder="Nhập lại mật khẩu"
          name="confirmation_pwd"
          id="confirmation_pwd"
        />
        <br />
        <div class="sameform">
          <label for="gioitinh">Giới tính:</label>
          <select
            id="gioitinh"
            class="samaselectinfo"
            name="gender"
          >
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
          </select>
        </div>
        <div class="sameform">
          <label for="ngaysinh">Ngày sinh</label>
          <input
            type="date"
            id="ngaysinh"
            class="samaselectinfo"
            required
            placeholder="Ngày sinh:"
            name="date"
          />
        </div>
        <input type="submit" class="submit" value="Đăng kí" />
      </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(function () {
        $("#RegisterForm").submit(function () {
          if (
            $("[name=password]").val() != $("[name=confirmation_pwd]").val()
          ) {
            alert("Mật khẩu không khớp!!! Vui lòng nhập lại!!");
            return false;
          }
          return true;
        });
      });
    </script>
  </body>
  
</html>
