<?php
require_once('../db/dbhelper.php');
require_once('../utils/uitility.php');
$fullName = $email = $address = $date = $gender = $benhkham = $id_user = $id_bacsi = $dateKham = $id = $phoneNumber = '';
if(!empty($_GET)){
  $id = getGET('id');
  $sql = "select * from donchopheduyet where id =".$id;
  $result = executeResult($sql,true);
  $fullName = $result['fullName'];
  $email = $result['email'];
  $address = $result['address'];
  $date = $result['date'];
  $gender = $result['gender'];
  $benhkham = $result['benhkham'];
  $id_user = $result['id_user'];
  $phoneNumber= $result['phoneNumber'];
}
if(!empty($_POST)){
  $fullName = getPOST('fullName');
  $email = getPOST('email');
  $address = getPOST('address');
  $date = getPOST('date');
  $gender = getPOST('gender');
  $benhkham = getPOST('benhkham');
  $id_bacsi = getPOST('bacsi');
  $dateKham =getPOST('dateKham');
  $phoneNumber =getPOST('phoneNumber');
  $sql = "insert into lichkham(fullName, email, address, date, gender,benhkham,id_bacsi,id_user,dateKham,phoneNumber) values('$fullName','$email','$address','$date',$gender,'$benhkham','$id_bacsi','$id_user','$dateKham','$phoneNumber')";
  execute($sql);
  $sql = "delete from donchopheduyet where id= ".$id;
  execute($sql);
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
    <link rel="stylesheet" href="./xeplich.css" />
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
      <form method='post' action="" class="form">
        <h1 class="head">Xếp lịch đơn khám</h1>
        <input
          type="text"
          class="tkmk"
          required
          placeholder="Họ và tên"
          name="fullName"
          value="<?=$fullName?>"
        />
        <input
          type="text"
          class="tkmk"
          required
          placeholder="Email"
          name="email"
          value="<?=$email?>"
        />
        <input
          type="text"
          class="tkmk"
          required
          placeholder="Địa chỉ"
          name="address"
          value="<?=$address?>"
        />
        <input
          type="text"
          class="tkmk"
          required
          placeholder="Số Điện Thoại"
          name="phoneNumber"
          value="<?=$phoneNumber?>"
        />
        <div class="sameform">
          <input
            type="text"
            id="ngaysinh"
            class="tkmk"
            required
            placeholder="Ngày sinh"
            name="date"
            onfocus="this.type='date'"
            onblur="this.type='text'"
            value="<?=$date?>"
          />
        </div>
        <div class="sameform">
          <select
            id="gioitinh"
            class="tkmk"
            name="gender"
            required
          >
            <option value="">Giới tính</option>
            <option value="1"
            <?php
                if($gender=== '1'){
                  echo 'selected';
                }
            ?>
            >Nam</option>
            <option value="0"
            <?php
                if($gender=== '0'){
                  echo 'selected';
                }
            ?>
            >Nữ</option>
          </select>
        </div>
        <select
          id="gioitinh"
          class="tkmk"
          name="benhkham"
          required
        >
          <option value="">Bệnh khám</option>
          <?php
            $sql = "select * from danhsachbenhkham";
            $list = executeResult($sql);
            foreach($list as $item) {
              if($item['id'] === $benhkham) {
                echo ' <option value="'.$item['id'].'" selected >'.$item['tenBenh'].'</option>';
              } else {
                echo '<option value="'.$item['id'].'">'.$item['tenBenh'].'</option>';
              }
            }
          ?>
        </select>
        <select  id="gioitinh" class="tkmk" name="bacsi">
          <option value="">Bác sĩ</option>
          <?php
            $sql = "select * from bacsi";
            $list = executeResult($sql);
            foreach($list as $item) {
                echo '<option value="'.$item['id'].'">'.$item['fullName'].'</option>';
            }
          ?>
        </select>
        <input
          type="text"
          class="tkmk"
          required
          placeholder="Ngày khám"
          name="dateKham"
          onfocus="this.type='date'"
          onblur="this.type='text'"
        />
        <button class="btn">Hoàn tất</button>
      </form>
    </div>
  </body>
</html>
