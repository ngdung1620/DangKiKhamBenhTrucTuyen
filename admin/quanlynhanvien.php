<section class='content'>
  <section class='head'>
    <div class="container">
      <h2 class='head__title'>Danh sách nhân viên</h2>
      <a href="./themnhanvien.php"> <button class="btn btn-success mt-4"><i class="fas fa-plus me-2"></i>Thêm nhân viên</button></a>
      <table class="table table-bordered mt-4 ">
        <thead class='table-success'>
          <tr>
            <th scope="col">STT</th>
            <th scope="col"width="150px">Họ và tên</th>
            <th scope="col" width="100px">Ngày sinh</th>
            <th scope="col" width="90px">Giới tính</th>
            <th scope="col" width="90px">Địa chỉ</th>
            <th scope="col" width="100px">Email</th>
            <th scope="col">Mật khẩu</th>
            <th scope="col" width="60px"></th>
            <th scope="col" width="60px"></th>
          </tr>
        </thead>
        <tbody>
        <?php
            $sql = "select * from nhanvien";
            $list = executeResult($sql);
            $index_user = 1;
            foreach($list as $item) {
                echo '
                <tr>
                <td>'.($index_user++).'</td>
                <td>'.$item['fullName'].'</td>
                <td>'.$item['date'].'</td>
                ';
                if($item['gender']==='1'){
                  echo '<td>Nam</td>';
                }else {
                  echo '<td>Nữ</td>';
                }
               echo '
                <td>'.$item['address'].'</td>
                <td>'.$item['email'].'</td>
                <td>'.$item['password'].'</td>
                <td><button class="btn btn-warning" onclick=\'window.open("themnhanvien.php?id='.$item['id'].'","_self")\'>Sửa</button></td>
                <td><button class="btn btn-danger delete" onclick="deleteNhanvien('.$item['id'].')">Xoá</button></td>
                </tr>
                ';
            }
          ?>
        </tbody>
      </table>
    </div>
  </section>
</section>