<section class='content active'>
  <section class='head'>
    <div class="container">
      <h2 class='head__title'>Danh sách đơn khám</h2>
      <table class="table table-bordered mt-4 ">
        <thead class='table-success'>
          <tr>
            <th scope="col">STT</th>
            <th scope="col" width="150px">Họ và tên</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Bệnh khám</th>
            <th scope="col" width="100px"></th>
          </tr>
        </thead>
        <tbody>
          <?php
              $sql = "select * from donchopheduyet";
              $list = executeResult($sql);
              $index = 1;
              foreach ($list as $row){
                $sql = 'select * from danhsachbenhkham where id = '.$row['benhkham'];
                $benhkham = executeResult($sql,true);
                $ten= $benhkham['tenBenh'];
                echo '
                <tr>
                <th scope="row">'.($index++).'</th>
                <td>'.$row['fullName'].'</td>
                <td>'.$row['date'].'</td>
                ';
                if($row['gender']=== '1') {
                  echo '<td>Nam</td>';
                } else {
                  echo '<td>Nữ</td>';
                }
                echo '
                <td>'.$row['address'].'</td>
                <td>'.$row['phoneNumber'].'6</td>
                <td>'.$ten.'</td>
                <td><button class="btn btn-warning" onclick=\'window.open("./xeplich.php?id='.$row['id'].'","_self")\'>Xếp lịch</button></td>
                </tr>
                ';
              }
          ?>
        </tbody>
      </table>
    </div>
  </section>
</section>