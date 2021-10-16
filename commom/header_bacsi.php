<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient fixed-top ">
    <div class="container">
      <a class="navbar-brand fs-5 symbol" href="./index.php">
        <img src="../asset/image/logo-tam-tri-2.png" alt="" class="logo">
        <span>
          <span>Bệnh Viện đa khoa</span>
          <span>Tâm Đức</span>
        </span>

      </a>
     <div class="user">
        <span class="text-light fs-5 user__name">
         <?=$data['fullName']?>
          <i class="fas fa-user-circle fs-4 ml-3"></i> 
        </span>
        <ul class="user__option">
        <li class='user__option-item'>
           <a href="../bacsi/doimatkhau.php">Đổi mật khẩu</a>
          </li>  
          <li class='user__option-item'>
           <a href="../bacsi/logout.php">Đăng Xuất</a>
          </li>  
        </ul>
     </div>
    </div>
  </nav>
  <div class='space' style='margin-top: 120px;'></div>