<?php
ob_start();
session_start();
if(array_key_exists("username", $_POST)){
		$username = $_POST['username'];
		$password = $_POST['password'];
		require_once ROOT . DS . 'services' . DS . 'GuestServices.php';
		$service = new GuestServices();
		$checker = $service->checkAccount($username, $password);
		if($checker === True){
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                   // header("Location: profile");
		} else{
                    $err = "Username / Password không chính xác";
                    $_SESSION['err']= $err;
                    header('Location: login');exit;
                }
}
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
		if($_SESSION['username'] != '' && $_SESSION['password'] != '') {
				header("Location: profile");
		}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="public/css/account.css">
		<link rel="stylesheet" href="public/css/nav_bar.css" type="text/css">
		<link rel="stylesheet" href="public/css/footer_container.css" type="text/css">
		<title>LOG IN</title>
		<link rel="shortcut icon" type="image/png" href="images/logoicon.png" />
	</head>
	<body>
		<!-- includes nav bar -->
		<?php require_once ROOT . DS . 'mvc' . DS . 'views' . DS . 'nav_bar.php'; ?>
		<?php  ?>
		<div class="container">
			<form action="" method="POST">
				<h2>ĐĂNG NHẬP</h2>
				<input type="text" name="username" placeholder="Username" required>
				<input type="password" name="password" placeholder="Password" required>
				<div class="btn-box">
					<button type="submit">Login</button>
				</div>
				                                
                                <span style="padding-left: 5px; padding-bottom: 5px; color: red; text-align: left;">
                                    <?php
                                    if(isset($_SESSION["err"])){
                                        echo "*".$_SESSION["err"];
                                        unset($_SESSION['err']);
                                    }
                                    ?>
                                </span>
			</form>
			<a href="account"><b><i><u> Chưa có tài khoản ? Hãy đăng kí mới tại đây </u></i></b></a>
		</div>