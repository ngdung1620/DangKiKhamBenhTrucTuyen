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
  require_once('./form_dangkikhambenh.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='../asset/css/all.min.css' type='text/css' rel="stylesheet"/>
  <link href='./index.css' type='text/css' rel="stylesheet"/>
  <link href='../commom/base.css' type='text/css' rel="stylesheet"/>
  <link href='../asset/css/bootstrap.min.css' type='text/css' rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <title>Đăng kí khám bệnh</title>
</head>
<body>
<?php
  include_once('../commom/header.php');
?>
<section class='head'>
      <div class="container">
        <h2 class='head__title'>Đăng kí khám bệnh</h2>
      </div>
</section>
  <section class="register-hospital">
  <div class="container">
    <div class="row">
      <div class="col col-lg-4">
        <div class="register-hospital__note">
          <strong>Lưu ý :</strong>
          <p>Lịch hẹn có hiệu lực sau khi có xác nhận chính thức từ Phòng khám Bệnh viện Tâm Đức</p>
          <p>Quý khánh hàng vui lòng cung cấp thông tin chính xác để được phục vụ tốt nhất. Trong trường hợp cung cấp sai thông tin email &amp; điện thoại, việc xác nhận cuộc hẹn sẽ không hiệu lực.</p>
          <p>Quý khách sử dụng dịch vụ đặt hẹn trực tuyến, xin vui lòng đặt trước ít nhất là 24 giờ trước khi đến khám.</p>
          <p>Trong trường hợp khẩn cấp hoặc nghi ngờ có các triệu chứng nguy hiểm, quý khách vui lòng ĐẾN TRỰC TIẾP Phòng khám hoặc các trung tâm y tế gần nhất để kịp thời xử lý.</p>
        </div>
      </div>
      <div class="col col-lg-8 form">
        <form  method='post' class='form-content'>
            <h5>Đăng kí khám bệnh</h5>
            <h6>Vui lòng điền đầy đủ thông tin bên dưới để đăng kí khám bệnh theo yêu cầu:</h6>
              <div class="row g-3">
                <div class="col-lg-6">
                  <input class='form-input' type="text" name="fullName" placeholder="Họ và tên" required>
                </div>
                <div class="col-lg-6">
                  <input class='form-input' type="text" name="email" placeholder="Email" required>
                </div>
                <div class="col-lg-6">
                  <input class='form-input' placeholder="Ngày sinh" type="text" onfocus="(this.type='date')"
                  onblur="(this.type='text')" name='date' required/>
                </div>
                <div class="col-lg-6">
                  <input class='form-input' type="text" name="phoneNumber" placeholder="Số điện thoại" required>
                </div>
                <div class="col col-lg-12">
                  <select class='form-input' name='gender' required>
                  <option value="">Giới tính</option>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                  </select>
                </div>
                <div class="col col-lg-12">
                  <select class='form-input' name='benhKham' required>
                  <option value="">Xét nhiệm</option>
                  <?php
                      $sql = "select * from danhsachbenhkham";
                      $list = executeResult($sql);
                      foreach ($list as $item) {
                        echo '<option value="'.$item['id'].'">'.$item['tenBenh'].'</option>';
                      }
                  ?>
                  </select>
                </div>
                <div class="col col-lg-12">
                  <input class='form-input' type="text" name="address" placeholder="Địa chỉ" required>
                </div>
              </div>
              <button class="btn btn-primary mt-4">Đăng kí</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  </section>
<?php
    include_once('../commom/footer.php');
?>
</body>
</html>