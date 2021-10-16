<?php
  session_start();
  require_once('../db/dbhelper.php');
  require_once('../utils/uitility.php');
  $result = validateToken('nhanvien','token2');
  if($result === null) {
    header('location:./login.php');
    die();
  }
  $id = '';
  $id = $result['id_user'];
  $sql = "select * from nhanvien where id ='$id'";
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
  <title>Hệ thống dành cho nhân viên</title>
</head>

<body>
  <?php
  include_once('../commom/header_nhanvien.php');
  ?>
  <div class="container">
    <div class="row gx-4">
      <div class="col col-lg-2 sidebar">
        <h4 class="sidebar__title">Danh mục</h4>
        <ul class="sidebar__list">
          <li class="sidebar__item active">Danh sách đơn khám</li>
          <li class="sidebar__item">Danh sách lịch khám</li>
        </ul>
      </div>
      <div class="col col-lg-10 ">
       <div class="wrap">
       <?php
          include_once('./danhsachdonkham.php');
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
  </script>
</body>

</html>