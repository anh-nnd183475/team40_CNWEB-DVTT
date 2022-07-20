<?php
require_once 'lib_config.php';

// check session
ob_start();
session_start();

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$re_new_password = $_POST['re_new_password'];

require_once ROOT . DS . 'services' . DS . 'GuestServices.php';
$service = new GuestServices();
$username = $_SESSION['username'];

$person = $service->get($username);
$_SESSION['perror'] = 'Đổi mật khẩu thành công';
if($new_password === $re_new_password){
    if($old_password === $person->getPassword()){
        $new_person = new Guest($person->getUsername(), $new_password, $person->getName(), $person->getAddress(), $person->getTelephone());
        $service->update($new_person);
    } else {
        $_SESSION['perror'] = 'Nhập sai mật khẩu cũ';
    }
} else {
    $_SESSION['perror'] = 'Mật khẩu nhập lại không khớp';
}

header("Location: ../login");
