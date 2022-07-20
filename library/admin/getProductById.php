<?php
    require_once '../lib_config.php';

    require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'ComputerMouseProducts.php';
    require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Laptop.php';
    require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'PC.php';
    require_once ROOT . DS . 'services' . DS . 'products' . DS .'ComputerMouseProductsServices.php';
    require_once ROOT . DS . 'services' . DS . 'products' . DS .'LaptopServices.php';
    require_once ROOT . DS . 'services' . DS . 'products' . DS .'PCServices.php';

    $type=$_GET['type'];
    $id=$_GET['id'];

    if($type=='1'){
        $service=new LaptopServices();
        $products = $service->getAll();
        foreach($products as $product){
            if($product->getProductID() != $id){
                continue;
            }
            echo $product->getProductID() . "&"
            . $product->getModel() . '&'
            . $product->getImage() . '&'
            .  $product->getPrice() . '&'
            . $product->getWeigh() . '&'
             . $product->getColor() . '&'
           .  $product->getNumberOfProducts() . '&'
            . $product->getSupplier() . '&'
           .  $product->getCpu() . '&'
            .  $product->getRam() . '&'
           . $product->getStorage() . '&'
           .  $product->getScreen() . '&'
            .  $product->getCard() . '&'
            . $product->getMainConnection() . '&'
             . $product->getOs() . '&'
            .  $product->getBattery() . '&'
             . $product->getDescription() . '&'
            . " "  . '&'
            . ' '  . '&'
            . ' '  . '&'
            . ' ' . '&'
           . ' ';

        }
    }elseif($type=='2'){
            $service=new PCServices();
            $products = $service->getAll();
            foreach($products as $product){
                if($product->getProductID() != $id){
                    continue;
                }
                echo $product->getProductID() . "&"
            . $product->getModel() . '&'
            . $product->getImage() . '&'
            .  $product->getPrice() . '&'
            . $product->getWeigh() . '&'
             . $product->getColor() . '&'
           .  $product->getNumberOfProducts() . '&'
            . $product->getSupplier() . '&'
           .  $product->getCpu() . '&'
            .  $product->getRam() . '&'
           . $product->getStorage() . '&'
           .  $product->getScreen() . '&'
            .  $product->getCard() . '&'
            . $product->getMainConnection() . '&'
             . $product->getOs() . '&'
            .  " " . '&'
             . $product->getDescription() . '&'
            .  $product->getCase()  . '&'
            . ' '  . '&'
            . ' '  . '&'
            . ' ' . '&'
           . ' ';


            }
    }elseif($type=='3'){
        $service=new ComputerMouseProductsServices();
        $products = $service->getAll();
        foreach($products as $product){
            if($product->getProductID() != $id){
                continue;
            }

            echo $product->getProductID() . "&"
            . $product->getModel() . '&'
            . $product->getImage() . '&'
            .  $product->getPrice() . '&'
            . $product->getWeigh() . '&'
             . $product->getColor() . '&'
           .  $product->getNumberOfProducts() . '&'
            . $product->getSupplier() . '&'
           .  " " . '&'
            .  " " . '&'
           . " " . '&'
           .  " " . '&'
            .  " " . '&'
            . " " . '&'
             . " " . '&'
            .  " " . '&'
             . $product->getDescription() . '&'
            .  " "  . '&'
            . $product->getStandardConnection() . '&'
            . $product->getConnectionProtocon() . '&'
            . $product->getIsLed() . '&'
           . $product->getSize();

        }
    }