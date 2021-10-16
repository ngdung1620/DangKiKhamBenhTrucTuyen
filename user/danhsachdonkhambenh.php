
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='../asset/css/all.min.css' type='text/css' rel="stylesheet" />
  <link href='./index.css' type='text/css' rel="stylesheet" />
  <link href='../asset/css/bootstrap.min.css' type='text/css' rel="stylesheet" />
  <link href='../commom/base.css' type='text/css' rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <title>Danh sách đơn khám bệnh</title>
</head>
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
  $id_user = $data['id'];
?>
<body>
  <?php
  include_once('../commom/header.php');
  ?>
  <section class='head'>
    <div class="container">
      <h2 class='head__title'>Danh sách đơn khám bệnh</h2>
  </div>
  </section>
  <section>
    <div class="container">
      <table class="table table-bordered ">
      <thead class='table-success'>
          <tr>
            <th scope="col">STT</th>
            <th scope="col" width="150px">Họ và tên</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Bệnh khám</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $index = 1;
            $sql = "select * from donkhambenh where id_user =".$id_user;
            $list = executeResult($sql);
            foreach ($list as $item) {
              $sql = 'select * from danhsachbenhkham where id = '.$item['benhkham'];
              $benhkham = executeResult($sql,true);
              $ten= $benhkham['tenBenh'];
              echo '
              <tr>
              <th scope="row">'.($index++).'</th>
              <td>'.$item['fullName'].'</td>
              <td>'.$item['date'].'</td>';
              if($item['gender'] === '1') {
                echo ' <td>Nam</td>';
              } else {
                echo ' <td>Nữ</td>';
              }
              echo ' 
              <td>'.$item['address'].'</td>
              <td>'.$item['phoneNumber'].'</td>
              <td>'.$ten.'</td>
              </tr>
              ';
            }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  <?php
  include_once('../commom/footer.php');
  ?>
</body>

</html>