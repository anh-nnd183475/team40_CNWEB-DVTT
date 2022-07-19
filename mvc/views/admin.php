<?php
// check session
ob_start();
session_start();
if(!isset($_SESSION['admin_username'])){
    header("Location: login-admin");
} else {
    if($_SESSION['admin_username'] == ""){
        header("Location: login-admin");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADMIN</title>
        <link rel="shortcut icon" type="image/png" href="images/logoicon.png" />
        <link rel="stylesheet" href="public/css/admin/admin.css">
    </head>
    <body>
        <div class="logout">
          <a href="library/refresh_session.php" class="logout-btn">Đăng xuất</a>
        </div>
        <a href="account-management"><div class="left">
            <p>QUẢN LÝ KHÁCH HÀNG</p>
        </div></a>
        <a href="product-management"><div class="right">
            <p>QUẢN LÝ SẢN PHẨM</p>
        </div>
      </a>
      <div >
        <img src="public/images/admin/banner2.jpg" class="banner" alt="" width="80%">
        </div>
</body>
</html>
