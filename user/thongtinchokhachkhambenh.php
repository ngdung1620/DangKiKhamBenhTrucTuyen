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
  <link href='../asset/css/all.min.css' type='text/css' rel="stylesheet" />
  <link href='./index.css' type='text/css' rel="stylesheet" />
  <link href='../asset/css/bootstrap.min.css' type='text/css' rel="stylesheet" />
  <link href='../commom/base.css' type='text/css' rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <title>Thông tin cho khách khám bệnh</title>
</head>

<body>
  <?php
  include_once('../commom/header.php');
  ?>
  <section class='head'>
    <div class="container">
      <h2 class='head__title'>thông tin cho khách khám bệnh</h2>
    </div>
  </section>
  <section>
    <div class="container">
      <p><span style="font-weight: 400;">Quý khách vui lòng đọc kỹ <strong>Hướng dẫn khách thăm bệnh</strong> để bố trí thời gian thuận tiện cho bản thân cũng như đảm bảo thời gian nghỉ ngơi của người bệnh đang khám và chữa bệnh tại <a href="./index.php" target="_blank" rel="noopener noreferrer" data-schema-attribute="">Bệnh viện Đa khoa Tâm Đức</a>:</span></p>
      <h2><span style="color: #102e9e;"><strong>Giờ thăm người bệnh</strong></span></h2>
      <ul>
        <li style="font-weight: 400;"><strong><span style="color: #ff0000;"><em>Sáng: từ 6h00 – 7h00</em></span></strong></li>
        <li style="font-weight: 400;"><strong><span style="color: #ff0000;"><em>Chiều: từ 15h00 – 21h00</em></span></strong></li>
        <li style="font-weight: 400;"><strong><span style="color: #ff0000;"><em>Thứ 7, Chủ nhật và ngày lễ: từ 6h00 – 21h00</em></span></strong></li>
      </ul>
      <p><span style="font-weight: 400;">Ngoài thời gian nói trên, thân nhân vào thăm người bệnh cần có sự đồng ý của điều dưỡng trưởng khoa hoặc điều dưỡng trưởng ca trực.</span></p>
      <h2><span style="color: #102e9e;"><strong>Quy định vào thăm</strong></span></h2>
      <ul>
        <li style="font-weight: 400;"><span style="font-weight: 400;">Người vào thăm bệnh nhân phải có thẻ ra vào.</span></li>
        <li style="font-weight: 400;"><span style="font-weight: 400;">Mỗi lượt vào phòng bệnh không quá 2 người.</span></li>
        <li style="font-weight: 400;"><span style="font-weight: 400;">Thời gian cho mỗi lượt thăm không quá 30 phút.</span></li>
        <li style="font-weight: 400;"><span style="font-weight: 400;">Ngoài thời gian trên, hoặc cần ở lại qua đêm, người nhà phải đăng ký với Điều dưỡng của khu nội trú (không quá 01 người/phòng).</span></li>
        <li style="font-weight: 400;"><span style="font-weight: 400;">Không mang động vật vào bệnh viện và không mang hoa vào phòng bệnh.</span></li>
        <li style="font-weight: 400;"><span style="font-weight: 400;">Không hút thuốc lá hoặc có hành vi gây ồn trong bệnh viện.</span></li>
        <li style="font-weight: 400;"><span style="font-weight: 400;">Không sử dụng hoặc điều chỉnh các thiết bị y tế trong phòng bệnh.</span></li>
        <li style="font-weight: 400;"><span style="font-weight: 400;">Tôn trọng các hoạt động chuyên môn của nhân viên y tế. Nếu cần trao đổi các vấn đề có liên quan đến người thân, xin vui lòng liên hệ nhân viên chăm sóc khách hàng, điều dưỡng hoặc bác sĩ phụ trách phòng bệnh.&nbsp;</span></li>
      </ul>
      <h2><span style="color: #102e9e;"><strong>Hướng dẫn thủ tục vào thăm người bệnh</strong></span></h2>
      <ul>
        <li><span style="font-weight: 400;"><strong>Bước 1:</strong> Đăng ký ra vào tại quầy thông tin, gửi lại giấy tờ tùy thân và nhận thẻ ra vào.</span></li>
        <li><span style="font-weight: 400;"><strong>Bước 2:</strong> Di chuyển tới khu vực khoa/phòng mà người bệnh đang lưu trú theo hướng dẫn của nhân viên bệnh viện.</span></li>
        <li><span style="font-weight: 400;"><strong>Bước 3:</strong> Liên lạc với điều dưỡng để được vào thăm người bệnh.</span></li>
        <li><span style="font-weight: 400;"><strong>Bước 4:</strong> Mặc áo choàng, đeo khẩu trang, đi dép chuyên dùng… (nếu được yêu cầu).&nbsp;</span></li>
        <li><span style="font-weight: 400;"><strong>Bước 5:</strong> Đến đúng khoa, phòng người bệnh cần thăm, không đi sang các phòng bệnh khác.</span></li>
        <li><span style="font-weight: 400;"><strong>Bước 6:</strong> Ra về đúng giờ quy định, trở lại quầy đăng ký để trả thẻ và nhận lại giấy tờ tùy thân.</span></li>
      </ul>
    </div>
  </section>
  <?php
  include_once('../commom/footer.php');
  ?>
</body>

</html>