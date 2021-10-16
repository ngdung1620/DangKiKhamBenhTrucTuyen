<?php
  require_once('../db/dbhelper.php');
  require_once('../utils/uitility.php');
  $fullName = $address = $email = $password = $date = $gender = $id_bacsi ='';
  if(isset($_GET['id'])){
    $id_bacsi =  getGET('id');
    $sql = 'select * from bacsi where id = ' . $id_bacsi;
    $user = executeResult($sql,true);
    if($user != null && count($user)>0) {
      $fullName = $user['fullName'];
      $address = $user['address'];
      $email = $user['email'];
      $password = $user['password'];
      $date = $user['date'];
      $gender = $user['gender'];
    }else {
        $id_bacsi = '';
    }
}
  if(!empty($_POST)){
    $fullName = getPOST('fullName');
    $address = getPOST('address');
    $email = getPOST('email');
    $password = getPOST('password');
    $date = getPOST('date');
    $gender = getPOST('gender');
    if($id_bacsi != ''){
      $sql = "update bacsi set fullName='$fullName', address='$address', email='$email',password='$password',date='$date',gender=$gender where id=".$id_bacsi;
      execute($sql);
      header("Location:./index.php");
      die();
    }else {
      $sql = "insert into bacsi(fullName, email, address,password,date,gender) value('$fullName','$email','$address','$password','$date',$gender)";
      execute($sql);
      header("Location:./index.php");
      die();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./themthanhvien.css" />
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
      <form method="post" action=""class="form">
        <h1 class="head">
          <?php
              if($id_bacsi === '') {
                  echo 'Thêm bác sĩ';
              }else {
                echo 'Cập nhật bác sĩ';
              }
          ?>
        </h1>
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
          placeholder="Địa chỉ"
          name="address"
          value="<?=$address?>"
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
            name="gender"
            id="gioitinh"
            class="tkmk"
            name="gender"
            required
          >
            <option value="">Giới tính</option>
            <option value="1"
              <?php
              if($gender === '1') { echo 'selected';}
              ?>
            >Nam</option>
            <option value="0"
            <?php
              if($gender === '0') { echo 'selected';}
            ?>
            >Nữ</option>
          </select>
        </div>
        <input
          type="text"
          class="tkmk"
          required
          placeholder="Email"
          name="email"
          value="<?=$email?>"
        />
        <input
          type="password"
          class="tkmk"
          required
          placeholder="Mật khẩu"
          name="password"
          value="<?=$password?>"
        />
        <button class="btn">
        <?php
              if($id_bacsi === '') {
                  echo 'Thêm bác sĩ';
              }else {
                echo 'Cập nhật bác sĩ';
              }
          ?>
        </button>
      </form>
    </div>
  </body>
</html>
