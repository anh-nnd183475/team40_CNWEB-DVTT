<?php
// check session
ob_start();
session_start();
if(!isset($_SESSION['username']) || $_SESSION['username'] == ''){
		header("Location: login");
}
require_once ROOT . DS . 'services' . DS . 'GuestServices.php';
$service = new GuestServices();
$username = $_SESSION['username'];
$person = $service->get($username);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="public/css/profile.css">
		<link rel="stylesheet" href="public/css/footer_container.css" type="text/css">
		<link rel="stylesheet" href="public/css/nav_bar.css">
                <script src="public/javascript/profile.js"></script>
		<title>PROFILE</title>
		<link rel="shortcut icon" type="image/png" href="images/logoicon.png" />
	</head>
	<!-- includes nav bar -->
	<?php require_once ROOT . DS . 'mvc' . DS . 'views' . DS . 'nav_bar.php'; ?>
	<section>
		<div class="account_container">
			<div class="left_side_bar">
				<h1>TÀI KHOẢN</h1>
				<ul>
					<li><a href="#profile"><i class="fa fa-user" aria-hidden="true"></i>Quản lý tài khoản</a></li>
					<li><a href="#order"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Lịch sử đơn hàng</a></li>
					<!-- <li><a href="#address"><i class="fa fa-truck" aria-hidden="true"></i>Địa chỉ giao hàng</a></li> -->
					<li><a href="#payment"><i class="fa fa-credit-card" aria-hidden="true"></i>Phương thức thanh toán</a></li>
					<li><a href="#pwd"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Quản lý mật khẩu</a></li>
					<li><hr></li>
					<li><a href="library/refresh_session.php"><button type="submit" style="font-size: 20px; padding: 3px 10px">Đăng xuất</button></a></li>
				</ul>
			</div>
			<div class="main_content">
				<div class="user" id ="profile">
					<div class="row">
						<div class="user-title">
							<h1 class= "h1title">Thông tin cá nhân</h1>
							<p style= "margin-left: 10px">Bạn có thể chỉnh sửa thông tin ở dưới đây</p>
							<hr>
						</div>
						<div class="user-content">
							<div class="label">
								<label for="sign_name">Tên đăng nhập</label>
								<label for="name">Tên</label>
								<!-- <label for="useremail">Email</label> -->
								<label for="phone">Số điện thoại</label>
								<label for="address">Địa chỉ</label>
								<!-- <label for="sex">Giới tính</label> -->
								<!-- <label for="birthday">Sinh nhật:</label> -->
							</div>
							<div class="input">
								<form action="library/refresh_profile.php" method="POST">
									<div class="input_text">
										<p><input type="text" name="username" class="sign_name" value = "<?php echo $person->getUsername(); ?>" readonly="readonly">
										<!-- <a href="">Change</a></p> -->
										<p><input type="text" name="name" class = "name" value = "<?php echo $person->getName(); ?>">
										<!-- <a href="">Change</a></p> -->
										<!-- <p><input type="email" class="useremail" value = "buiviethoang12062000@gmail.com">
										<a href="">Change</a></p> -->
										<p><input type="text" name="telephone" class="phone" value="<?php echo $person->getTelephone(); ?>">
										<p><input type="text" name="address" class="phone" value="<?php echo $person->getAddress(); ?>">
										<!-- <a href="">Change</a></p> -->
									</div>
									
									<br />
									<button type="submit">Save</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="order_content" id="order">
					<div class="row">
						<div class="status">
							<ul>
                                                                <li><button onclick='show_all()'>Tất cả</button></li>
                                                                <li><button onclick="show_by_status('stt0')">Đang xác nhận</button></li>
                                                                <li><button onclick="show_by_status('stt1')">Đang giao</button></li>
                                                                <li><button onclick="show_by_status('stt2')">Đã giao</button></li> 
                                                                <li><button onclick="show_by_status('stt3')">Đã hủy</button></li> 
                                                                <li><button onclick="show_by_status('stt4')">Trả hàng</button></li>
                                                                                                                              
							</ul>
						</div>
						<div class="search">
							<br /><!-- Chức năng tìm kiếm, phát triển sau -->
							<!-- <p><i class="fa fa-search" aria-hidden="true"></i><input type="text" placeholder="Tim kiem theo ten shop, ten sp"></p> -->
						</div>
						<div class="main_order">
							<?php
							$service = new GuestServices();
							$listProductsBill = $service->getListProductsBill($username);
							$sum0 = 0; $sum1 = 0;
							require_once ROOT . DS . 'services' . DS . 'products' . DS . 'LaptopServices.php';
							require_once ROOT . DS . 'services' . DS . 'products' . DS . 'PCServices.php';
							require_once ROOT . DS . 'services' . DS . 'products' . DS . 'ComputerMouseProductsServices.php';
							require_once ROOT . DS . 'services' . DS . 'TypeProductsServices.php';
							require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Type.php';
							foreach ($listProductsBill as $bill) {
								$product;
								$type = TypeProductsServices::checkType($bill->getProductID());
                                                                if($type == Type::PC){
                                                                        $service = new PCServices();
                                                                        $product = $service->get($bill->getProductID());
                                                                } else if ($type == Type::LAPTOP){
                                                                        $service = new LaptopServices();
                                                                        $product = $service->get($bill->getProductID());
                                                                } else if ($type == Type::MOUSE){
                                                                        $service = new ComputerMouseProductsServices();
                                                                        $product = $service->get($bill->getProductID());
                                                                }
                                                       
							?>
							
                                                        <?php if($bill->getStatus() == 0){ 
                                                                
                                                                 $sum0 += intval($product->getPrice()) * intval($bill->getQuantity());?>
							<div class="detail stt0" style="display: none">
								<div class="col-1">
									<img src="<?php echo $product->getImage() ?>" alt="">
								</div>
								<div class="col-2">
									<p id = 'deal'><?php echo $bill->getDateBill() ?></p>
                                                                        <p id = 'status'><?php echo "Đang xác nhận";?></p>
									<p><?php echo $product->getModel() ?></p>
									<p id = 'quantity'>x<?php echo $bill->getQuantity() ?></p>
								</div>
								<div class="col-3">
									<p><!--<del>1293$</del>--><?php echo intval($product->getPrice())*intval($bill->getQuantity()) ?></p>
								</div>
								<hr>
							</div>                                     
                                                                                                         
                                                        <?php } ?>
                                                    
                                                        <?php if($bill->getStatus() == 1){ 
                                                                 
                                                                 $sum1 += intval($product->getPrice()) * intval($bill->getQuantity());?>
							<div class="detail stt1" style="display: none">
								<div class="col-1">
									<img src="<?php echo $product->getImage() ?>" alt="">
								</div>
								<div class="col-2">
									<p id = 'deal'><?php echo $bill->getDateBill() ?></p>
                                                                        <p id = 'status'><?php echo "Đang giao hàng";?></p>
									<p><?php echo $product->getModel() ?></p>
									<p id = 'quantity'>x<?php echo $bill->getQuantity() ?></p>
								</div>
								<div class="col-3">
									<p><!--<del>1293$</del>--><?php echo intval($product->getPrice())*intval($bill->getQuantity()) ?></p>
								</div>
								<hr>
							</div>
                                                        <?php } ?>

                                                        <?php if($bill->getStatus() == 2){ ?>
							<div class="detail stt2" style="display: none">
								<div class="col-1">
									<img src="<?php echo $product->getImage() ?>" alt="">
								</div>
								<div class="col-2">
									<p id = 'deal'><?php echo $bill->getDateBill() ?></p>
                                                                        <p id = 'status'><?php echo "Đã giao hàng";?></p>
									<p><?php echo $product->getModel() ?></p>
									<p id = 'quantity'>x<?php echo $bill->getQuantity() ?></p>
								</div>
								<div class="col-3">
									<p><!--<del>1293$</del>--><?php echo intval($product->getPrice())*intval($bill->getQuantity()) ?></p>
								</div>
								<hr>
							</div>
                                                        <?php } ?>  
                                                    
                                                        <?php if($bill->getStatus() == 3){ ?>
							<div class="detail stt3" style="display: none">
								<div class="col-1">
									<img src="<?php echo $product->getImage() ?>" alt="">
								</div>
								<div class="col-2">
									<p id = 'deal'><?php echo $bill->getDateBill() ?></p>
                                                                        <p id = 'status'><?php echo "Đã hủy";?></p>
									<p><?php echo $product->getModel() ?></p>
									<p id = 'quantity'>x<?php echo $bill->getQuantity() ?></p>
								</div>
								<div class="col-3">
									<p><!--<del>1293$</del>--><?php echo intval($product->getPrice())*intval($bill->getQuantity()) ?></p>
								</div>
								<hr>
							</div>
                                                        <?php } ?>
                                                    
                                                        <?php if($bill->getStatus() == 4){ ?>
							<div class="detail stt3" style="display: none">
								<div class="col-1">
									<img src="<?php echo $product->getImage() ?>" alt="">
								</div>
								<div class="col-2">
									<p id = 'deal'><?php echo $bill->getDateBill() ?></p>
                                                                        <p id = 'status'><?php echo "Trả hàng";?></p>
									<p><?php echo $product->getModel() ?></p>
									<p id = 'quantity'>X<?php echo $bill->getQuantity() ?></p>
								</div>
								<div class="col-3">
									<p><!--<del>1293$</del>--><?php echo intval($product->getPrice())*intval($bill->getQuantity()) ?></p>
								</div>
								<hr>
							</div>                                                    
                                                    
                                                        <?php }} ?>   
                                                    
                                                        <div class="result" style='display: none'>  
                                                            <p><i class="fa fa-shield" aria-hidden="true"></i>&nbsp;Tổng:
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <span class='stt0' style='display: none'><?php echo $sum0 ?> VNĐ</span> 
                                                                <span class='stt1' style='display: none'><?php echo $sum1 ?> VNĐ</span> </p>
                                                		<hr>		
                                                        </div>
                                                                          
                                                    </div>
                                        </div>
				</div>
					
					<div class="payment_content" id='payment'>
						<div class="row">
							<div class="cards">
								<h1 style= "margin-left: 10px">Phương thức thanh toán</h1>
								<p id = 'add'><i class="fa fa-plus" aria-hidden="true"></i>Thay đổi phương thức thanh toán</p>
								<hr>
								<div class="content">
									<h2 style= "margin-left: 10px">Hiện cửa hàng chỉ cung cấp thanh toán bằng tiền mặt khi nhận hàng</h2>
								</div>
							</div>
						</div>
						
					</div>
					<div class="password" id='pwd'>
						<div class="row">
							<div class="pwd_title">
								<h1>Bảo mật</h1>
								<p>Thay đổi mật khẩu 6 tháng 1 lần để bảo vệ tài khoản của bạn</p>
								<hr>
							</div>
							<div class="label">
								<label for="new_pwd">Mật khẩu hiện tại</label>
								<label for="new_pwd_verify">Mật khẩu mới</label>
								<label for="validation">Nhập lại mật khẩu mới</label>
							</div>
							<form action="library/refresh_password.php" method="POST">
								<div class="input">
									<input type="password" name="old_password">
									<br>
									<input type="password" name="new_password">
									<br>
									<input type="password" name="re_new_password">
									<br>
									<button type="submit">Xác nhận</button>
								</div>
                                                                <span style="padding-left: 5px; padding-bottom: 5px; color: red; text-align: left;background-color: inherit">
                                                                    <?php
                                                                    if(isset($_SESSION["perror"])){
                                                                        echo "*".$_SESSION["perror"];
                                                                        unset($_SESSION['perror']);
                                                                    }
                                                                    ?>
                                                                </span>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</section>
