<section class='content'>
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
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "select * from lichkham";
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
            </tr>
              ';
            }
          ?>
        </tbody>
      </table>
    </div>
  </section>
</section>