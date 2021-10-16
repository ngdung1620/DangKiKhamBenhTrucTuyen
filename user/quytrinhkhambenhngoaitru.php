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
  <title>Quy trình khám bệnh ngoại trú</title>
</head>

<body>
  <?php
  include_once('../commom/header.php');
  ?>
  <section class='head'>
    <div class="container">
      <h2 class='head__title'>hướng dẫn thanh toán bảo hiểm</h2>
    </div>
  </section>
  <section>
    <div class="container">
      <p style="text-align: justify;"><em>Với mong muốn đáp ứng nhu cầu khám chữa bệnh, chăm sóc sức khỏe tốt nhất cho tất cả khách hàng, đồng thời giảm thiểu tối đa việc quá tải giường bệnh, tránh việc lây nhiễm chéo trong suốt thời gian nằm viện, đặc biệt là những thời điểm dịch bệnh vào mùa… Bệnh viện Đa khoa Tâm Anh triển khai <strong>dịch vụ thăm khám và điều thoặrị ngoại trú</strong> cho tất cả khách hàng.</em></p>
      <p style="text-align: justify;">Chấp hành đầy đủ quy định của <a href="https://moh.gov.vn/" target="_blank" rel="nofollow noopener noreferrer" data-schema-attribute="">Bộ Y tế</a> triển khai thực hiện việc thăm khám và điều trị bệnh thông tuyến bảo hiểm y tế (viết tắt là BHYT) trên toàn quốc. Theo đó, khách hàng có c không tham gia BHYT đến thăm khám và điều trị tại Bệnh viện Đa khoa Tâm Anh đều hưởng đầy đủ các quyền lợi đúng tuyến với chất lượng dịch vụ cao cấp, nhanh chóng, trực tiếp thăm khám và điều trị bởi các chuyên gia, bác sĩ đầu ngành.</p>
      <h2 style="text-align: justify;"><span style="color: #102e9e;"><strong>Quy trình thăm khám và điều trị bệnh ngoại trú tại Bệnh viện Đa khoa Tâm Đức</strong></span></h2>
      <h3><strong>Bước 1: Đăng ký khám, xuất trình giấy tờ tùy thân và BHYT tại quầy Lễ tân</strong></h3>
      <ul>
        <li style="text-align: justify;">Khách hàng xuất trình giấy tờ tùy thân (Chứng minh nhân dân, Thẻ căn cước công dân, Passport) cùng thẻ BHYT cho bộ phận Lễ tân.</li>
        <li style="text-align: justify;">Nhân viên bộ phận Lễ tân đối chiếu thông tin thẻ BHYT và giấy tờ tùy thân, tiến hành đăng ký lịch khám với bác sĩ theo yêu cầu của khách hàng.</li>
      </ul>
      <h3><strong>Bước 2: Thực hiện kiểm tra sinh hiệu tại quầy Điều dưỡng ở phòng khám</strong></h3>
      <ul>
        <li style="text-align: justify;">Khách hàng theo số thứ tự khám bệnh đã lấy từ quầy Lễ tân đến quầy Điều dưỡng phòng khám để được kiểm tra sinh hiệu.</li>
      </ul>
      <h3><strong>Bước 3: Gặp bác sĩ khám, chẩn đoán và chỉ định các xét nghiệm, điều trị tiếp theo (nếu có)</strong></h3>
      <ul>
        <li style="text-align: justify;">Các bác sĩ, chuyên gia đầu ngành trực tiếp thăm khám và đánh giá tình trạng; chẩn đoán, tư vấn và yêu cầu các chỉ định lâm sàng (xét nghiệm, X-quang, siêu âm…).</li>
      </ul>
      <h3><strong>Bước 4: Thanh toán phí cận lâm sàng tại quầy Thu ngân</strong></h3>
      <ul>
        <li style="text-align: justify;">Khách hàng tiến hành thanh toán các khoản phí cận lâm sàng.</li>
      </ul>
      <h3><strong>Bước 5: Thực hiện các xét nghiệm cận lâm sàng theo chỉ định của bác sĩ</strong></h3>
      <ul>
        <li style="text-align: justify;">Dựa trên chỉ định của bác sĩ mà khách hàng lần lượt tiến hành các xét nghiệm cận lâm sàng như siêu âm, xét nghiệm máu, chụp X-quang, MRI, CT scanner…</li>
      </ul>
      <h3><strong>Bước 6: Gặp bác sĩ đọc kết quả và tư vấn phương pháp điều trị</strong></h3>
      <ul>
        <li style="text-align: justify;">Sau khi có đầy đủ kết quả kiểm tra cận lâm sàng cần thiết, khách hàng gặp bác sĩ để được tư vấn tình trạng, phương pháp điều trị, cho toa thuốc, chỉ định nhập viện, chuyển viện hoặc hướng điều trị phù hợp và tốt nhất cho từng khách hàng.</li>
        <li style="text-align: justify;">Khách hàng còn được tư vấn chế độ dinh dưỡng, tập luyện, các biện pháp phòng ngừa bệnh tật hiệu quả.</li>
      </ul>
      <h3><strong>Bước 7: Mua thuốc và thanh toán tại Nhà thuốc bệnh viện</strong></h3>
      <ul>
        <li style="text-align: justify;"><em>Đối với khách hàng không có BHYT:</em>
          <ul>
            <li style="text-align: justify;">Khách hàng tiến hành mua thuốc và nghe hướng dẫn cách sử dụng thuốc.</li>
          </ul>
        </li>
        <li style="text-align: justify;"><em>Đối với khách hàng có BHYT:</em>
          <ul>
            <li style="text-align: justify;">Bộ phận Chăm sóc khách hàng, nhân viên Quầy Thu ngân giải đáp các thắc mắc của khách hàng về chính sách, quyền lợi tham gia BHYT đối với các khách hàng có BHYT.</li>
            <li style="text-align: justify;">Khách hàng được hướng dẫn thủ tục ra viện (nếu nhập viện), được thông báo khoản chi phí cuối cùng phải thanh toán sau trừ thẻ BHYT.</li>
            <li style="text-align: justify;">Khách hàng nhận lại thẻ BHYT cùng các giấy tờ tùy nhân.</li>
            <li style="text-align: justify;">Khách hàng nhận thuốc và được hướng dẫn, giải thích về liều lượng thuốc dùng theo chỉ định của bác sĩ.</li>
          </ul>
        </li>
      </ul>
      <p style="text-align: justify;"><span style="text-decoration: underline;"><strong>Lưu ý</strong>:</span> Trong tất cả những bước trên, nếu Quý khách hàng gặp khó khăn hoặc bất tiện ở bất kỳ bước vào xin vui lòng liên hệ nhân viên tại quầy Chăm sóc khách hàng hoặc Nhân viên y tế để được hướng dẫn chi tiết và nhanh chóng.</p>
      <p style="text-align: justify;">Để được tư vấn <strong>quy trình khám và điều trị ngoại trú</strong>, <a href="./dangkikhambenh.php" target="_blank" rel="noopener noreferrer" data-schema-attribute="">đặt lịch khám online</a> với các chuyên gia đầu ngành tại Bệnh viện Đa khoa Tâm Đức, quý khách hàng vui lòng liên hệ:</p>
    </div>
  </section>
  <?php
  include_once('../commom/footer.php');
  ?>
</body>

</html>