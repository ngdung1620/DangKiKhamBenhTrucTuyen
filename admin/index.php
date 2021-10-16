<?php
  session_start();
  require_once('../db/dbhelper.php');
  require_once('../utils/uitility.php');
  $result = validateToken('admin','token1');
  if($result === null) {
    header('location:./login.php');
    die();
  }
  $id = '';
  $id = $result['id_user'];
  $sql = "select * from admin where id ='$id'";
  $data = executeResult($sql,true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='../asset/css/all.min.css' type='text/css' rel="stylesheet" />
  <link href='../asset/css/bootstrap.min.css' type='text/css' rel="stylesheet" />
  <link href='../commom/base.css' type='text/css' rel="stylesheet" />
  <link rel="stylesheet" href="./index.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <title>Quản lí Hệ thống</title>
</head>

<body>
  <?php
  include_once('../commom/header_admin.php');
  ?>
  <div class="container">
    <div class="row gx-4">
      <div class="col col-lg-2 sidebar">
        <h4 class="sidebar__title">Danh mục</h4>
        <ul class="sidebar__list">
          <li class="sidebar__item active">Quản lý thành viên</li>
          <li class="sidebar__item">Quản lí nhân viên</li> 
          <li class="sidebar__item">Quản lý bác sĩ</li>
          <li class="sidebar__item">Danh sách lịch khám</li>
        </ul>
      </div>
      <div class="col col-lg-10 ">
        <div class="wrap">
          <?php
            include_once('./quanlythanhvien.php');
            include_once('./quanlynhanvien.php');
            include_once('./quanlybacsi.php');
            include_once('./quanlylichkham.php');
          ?>
        </div>
      </div>
    </div>
  </div>
  <script src="../asset/js/jquery.min.js"></script>
  <script type="text/javascript">
    const items = document.querySelectorAll(".sidebar__item");
    const contents = document.querySelectorAll(".content");
    items.forEach((item, index) => {
      const content = contents[index];
      item.onclick = function() {
        document.querySelector(".sidebar__item.active").classList.remove("active");
        document.querySelector(".content.active").classList.remove("active");
        this.classList.add("active");
        content.classList.add("active");
      };
    });

    function deleteUser(id) {
      option = confirm('Bạn có muốn xoá thành viên này không')
      if (!option) {
        return;
      }

      $.post('delete.php', {
        'id': id,
        'option':'user'
      }, function(data) {
        location.reload()
      })
    }
    function deleteNhanvien(id) {
      option = confirm('Bạn có muốn xoá nhân viên này không')
      if (!option) {
        return;
      }

      $.post('delete.php', {
        'id': id,
        'option':'nhanvien'
      }, function(data) {
        location.reload()
      })
    }
    function deleteBacsi(id) {
      option = confirm('Bạn có muốn xoá bác sĩ này không')
      if (!option) {
        return;
      }

      $.post('delete.php', {
        'id': id,
        'option':'bacsi'
      }, function(data) {
        location.reload()
      })
    }
  </script>
  
</body>
</html>