<?php
	require_once ROOT . DS . 'services' . DS . 'products' . DS . 'LaptopServices.php';
	require_once ROOT . DS . 'services' . DS . 'products' . DS . 'PCServices.php';
	require_once ROOT . DS . 'services' . DS . 'products' . DS . 'ComputerMouseProductsServices.php';
	if (!function_exists('currency_format')) {
		function currency_format($number, $suffix = 'đ') {
			if (!empty($number)) {
				return number_format($number, 0, ',', '.') . "{$suffix}";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="public/css/products.css" >
		<link rel="stylesheet" href="public/css/footer_container.css">
		<link rel="stylesheet" href="public/css/nav_bar.css">
		<title>PRODUCTS</title>
		<link rel="shortcut icon" type="image/png" href="images/logoicon.png" />
	</head>
	<body>
		<!-- includes nav bar -->
		<?php require_once ROOT . DS . 'mvc' . DS . 'views' . DS . 'nav_bar.php'; ?>
		<div class="product-container">
			<div class="left-bar">
				<!-- <div class="hidden">
					<button class="openbtn" onclick="openNav()">☰ Filter</button>
				</div> -->
				<div class="sidenav">
					<div>
						<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
					</div>
					<button class="dropdown-btn">Thương hiệu<i class = "fa fa-plus"></i></button>
					<div class="dropdown-container">
						<a href="search&label=all&supplier=dell">DELL<!--<span>(30000)</span>--></a>
						<a href="search&label=all&supplier=hp">HP<!--<span>(30000)</span>--></a>
						<a href="search&label=all&supplier=logitech">LOGITECH<!--<span>(30000)</span>--></a>
						<a href="search&label=all&supplier=acer">ACER<!--<span>(30000)</span>--></a>
						<a href="search&label=all&supplier=lenovo">LENOVO<!--<span>(30000)</span>--></a>
						<a href="search&label=all&supplier=asus">ASUS<!--<span>(30000)</span>--></a>
					</div>
					<button class="dropdown-btn">Giá tiền<i class = "fa fa-plus"></i></button>
					<div class="dropdown-container">
						<a href="search&label=all&price=1"> < 2.000.000<!--<span>(30000)</span>--></a>
						<a href="search&label=all&price=2">2.000.000 - 10.000.000<!--<span>(30000)</span>--></a>
						<a href="search&label=all&price=10">10.000.000 - 20.000.000<!--<span>(30000)</span>--></a>
						<a href="search&label=all&price=20"> > 20.000.000  <!--<span>(30000)</span>--></a>
					</div>
					<button class="dropdown-btn">Cân nặng<i class = "fa fa-plus"></i></button>
					<div class="dropdown-container">
						<a href="search&label=all&weigh=1">< 1kg<!--<span>(30000)</span>--></a>
						<a href="search&label=all&weigh=2">1kg - 2kg<!--<span>(30000)</span>--></a>
						<a href="search&label=all&weigh=3">2kg - 3kg<!--<span>(30000)</span>--></a>
						<a href="search&label=all&weigh=4">> 3kg<!--<span>(30000)</span>--></a>
					</div>
					<button class="dropdown-btn">Hệ điều hành<i class = "fa fa-plus"></i></button>
					<div class="dropdown-container">
						<a href="search&label=all&os=windows">Windows</a>
						<a href="search&label=all&os=linux">Linux</a>
						<a href="search&label=all&os=free dos">Free DOS</a>
						<!-- <a href="all_products_page.php?view=view&id_price=200000"><200000đ</a>
						<a href="all_products_page.php?view=view&id_price=200000"><200000đ</a> -->
					</div>
				</div>
			</div>
			<div class="all-product">
				<div class="title" >
					<h2>Máy tính xách tay</h2>
				</div>
				<a href="search&label=laptop" id = 'xem'><u>Xem tất cả >> </u></a>
				<div class="row">
					<?php
                                                // get all laptop
                                                $service = new LaptopServices();
                                                $listLaptop = $service->getAll();
                                                $cnt = 0;
                                                foreach ($listLaptop as $laptop){
                                                    $path = $laptop->getModel();
                                                    $path = str_replace(' ', '-', $path);
                                                    $cnt++;
					?>
					<div class="col-4">
						<div class="product-grid">
                                <a href="<?php echo "details/" . $laptop->getProductID() . "/" . $path ?>">
								<div class="product-image">
                                    <img src=<?php echo "\"" . $laptop->getImage() . "\"" ?> >
									<span class="product-trend-label">Chi tiết</span>
									<span class="product-discount-label">20%</span>
									
                                                                </div>
                                                    </a>
                                                    <div class="product-content">
							<p style="font-size: 20px; color: red"><?php echo currency_format($laptop->getPrice()) ; ?></p>
                                                    </div>
						</div>
					</div>
					<?php
						if($cnt > 3) break;
					}
					?>
				</div>
				<div class="title" >
					<h2>Máy tính để bàn</h2>
				</div>
				<a href="search&label=pc" id = 'xem'><u>Xem tất cả >></u></a>
				<div class="row">
					<?php $service = new PCServices();
                                            $listPC = $service->getAll();
                                            $cnt = 0;
                                            foreach ($listPC as $pc){
						$path = $pc->getModel();
                                		$path = str_replace(' ', '-', $path);
						$cnt++;
					?>
					<div class="col-4">
						<div class="product-grid">
							<a href="<?php echo "details/" . $pc->getProductID() . "/" . $path ?>">
								<div class="product-image">
									<img src=<?php echo "\"" . $pc->getImage() . "\"" ?> >
									<span class="product-trend-label">Chi tiết</span>
									<span class="product-discount-label">20%</span>
									
								</div>
							</a>
							<div class="product-content">
							<p style="font-size: 20px; color: red"><?php echo currency_format($pc->getPrice()) ; ?></p>
							</div>
						</div>
					</div>
					<?php
						if($cnt > 3) break;
					}
					?>
				</div>
				<div class="related-items">
					<div class="title">
						<h2>Phụ kiện máy tính</h2>
					</div>
					<a href="search&label=mouse" id = 'xem'><u>Xem tất cả >></u></a>
					<div class="row">
						<?php $service = new ComputerMouseProductsServices();
						$listMouse = $service->getAll();
						$cnt = 0;
						foreach ($listMouse as $mouse){
										$path = $mouse->getModel();
										$path = str_replace(' ', '-', $path);
						$cnt++;
						?>
						<div class="col-4">
							<div class="product-grid">
								<a href="<?php echo "details/" . $mouse->getProductID() . "/" . $path ?>">
									<div class="product-image">
										<img src=<?php echo "\"" . $mouse->getImage() . "\"" ?> >
										<span class="product-trend-label">Chi tiết</span>
										<span class="product-discount-label">20%</span>
										
									</div>
								</a>
								<div class="product-content">
								<p style="font-size: 20px; color: red"><?php echo currency_format($mouse->getPrice()) ; ?></p>
			
								</div>
							</div>
						</div>
						<?php
							if($cnt > 3) break;
						}
						?>
					</div>
				</div>
			</div>
		</div>
                
    <script type="text/javascript" src = "public/javascript/product.js"></script>
