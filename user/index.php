<?php
 session_start();
  require_once('../db/dbhelper.php');
  require_once('../utils/uitility.php');
  $result = validateToken();
  if($result === null) {
    header('location:./login.php');
    die();
  }
  $id = '';
  $id = $result['id_user'];
  $sql = "select * from users where id ='$id'";
  $data = executeResult($sql,true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../asset/css/all.min.css" />
  <link href='../asset/css/bootstrap.min.css' type='text/css' rel="stylesheet"/>
  <link href='../asset/css/all.min.css' type='text/css' rel="stylesheet"/>
  <link href='./index.css' type='text/css' rel="stylesheet"/>
  <link href='../commom/base.css' type='text/css' rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <title>Bệnh viện da khoa Tâm Đức</title>
</head>

<body>
  <?php
  include_once('../commom/header.php');
  ?>
  <section class='head'>
    <div class="container">
      <h2 class='head__title'>Dành cho khách hàng
      </h2>
    </div>
  </section>
    <section class='content'>
      <div class="container">
        <div class="row content-list g-4">
          <div class="col col-lg-4">
            <div class="content-item">
              <a href="./dangkikhambenh.php" class="content-item__link">
                <img src="../asset/image/dang-ky-kham-benh.jpg" alt="" class="content-item-img">
                <h3 class="content-item-title">Đăng kí khám bệnh</h3>
              </a>
            </div>
          </div>
          <div class="col col-lg-4">
            <div class="content-item">
              <a href="./danhsachdonkhambenh.php" class="content-item__link">
                <img src="../asset/image/danh-sach-dang-ki-kham-benh.jpg" alt="" class="content-item-img">
                <h3 class="content-item-title">danh sách đơn khám bệnh</h3>
              </a>
            </div>
          </div>
          <div class="col col-lg-4">
            <div class="content-item">
              <a href="./lichkhambenh.php" class="content-item__link">
                <img src="../asset/image/lichkhambenh.jpg" alt="" class="content-item-img">
                <h3 class="content-item-title">Lịch khám bệnh</h3>
              </a>
            </div>
          </div>
          <div class="col col-lg-4">
            <div class="content-item">
              <a href="./thongtinchokhachkhambenh.php" class="content-item__link">
                <img src="../asset/image/huong-dan-tham-benh.jpg" alt="" class="content-item-img">
                <h3 class="content-item-title">Thông tin cho khách thăm bệnh</h3>
              </a>
            </div>
          </div>
          <div class="col col-lg-4">
            <div class="content-item">
              <a href="./huongdanthanhtoanbaohiem.php" class="content-item__link">
                <img src="../asset/image/thanh-toan-bao-hiem.jpg" alt="" class="content-item-img">
                <h3 class="content-item-title">Hướng dẫn thanh toán bảo hiểm</h3>
              </a>
            </div>
          </div>
          <div class="col col-lg-4">
            <div class="content-item">
              <a href="./quytrinhkhambenhngoaitru.php" class="content-item__link">
                <img src="../asset/image/thu-tuc-xuat-nhap-vien.jpg" alt="" class="content-item-img">
                <h3 class="content-item-title">Quy trình khám và điều trị ngoại trú</h3>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
    include_once('../commom/footer.php');
  ?>
</body>
</html>