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
  $sql = "select * from bacsi where id =".$id;
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
  <title>Hệ thống dành cho bác sĩ</title>
</head>

<body>
  <?php
  include_once('../commom/header_bacsi.php');
  ?>
  <div class="container">
  <section class='content active'>
  <section class='head'>
    <div class="container">
      <h2 class='head__title'>Danh sách lịch khám</h2>
      <table class="table table-bordered mt-4">
        <thead class='table-success'>
          <tr>
            <th scope="col">STT</th>
            <th scope="col" width="150px">Họ và tên</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col" width="100px">Bệnh khám</th>
            <th scope="col">Bác sĩ</th>
            <th scope="col">Ngày khám</th>
            <th scope="col" width="110px"></th>
          </tr> 
        </thead>
        <tbody>
          <?php
            $sql = "select * from lichkham where id_bacsi =".$id;
            $list = executeResult($sql);
            $index = 1;
            foreach ($list as $item) {
              $sql = 'select * from danhsachbenhkham where id = '.$item['benhkham'];
              $benhkham = executeResult($sql,true);
              $ten= $benhkham['tenBenh'];
              $sql = 'select * from bacsi where id = '.$item['id_bacsi'];
              $bacsi = executeResult($sql,true);
              $tenbacsi= $bacsi['fullName'];
              echo '
              <tr>
              <th scope="row">'.($index++).'</th>
              <td>'.$item['fullName'].'</td>
              <td>'.$item['date'].'</td>
              ';
               if($item['gender'] === '1'){
                 echo '<td>Nam</td>';
               }else {
                echo '<td>Nữ</td>';
                }
                echo '
                <td>'.$item['address'].'</td>
                <td>'.$item['email'].'</td>
                <td>'.$item['phoneNumber'].'</td>
                <td>'.$ten.'</td>
                <td>'.$tenbacsi.'</td>
                <td>'.$item['dateKham'].'</td>
                <td><button class="btn btn-success " onclick="complete('.$item['id'].')">Đã xong</button></td>
            </tr>
              ';
            }
          ?>
        </tbody>
      </table>
    </div>
    </div>
  </section>
</section>
  </div>
  <script src="../asset/js/jquery.min.js"></script>
  <script type="text/javascript">
    function complete(id) {
      option = confirm('Bạn đã khám xong ?')
      if (!option) {
        return;
      }

      $.post('delete.php', {
        'id': id,
      }, function(data) {
        location.reload()
      })
    }
  </script>
</body>

</html>