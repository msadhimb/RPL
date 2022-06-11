<?php
include "database.php";

$d = new Database();

$uname = $_POST['username'];
$passwd = $_POST['password'];
$cpasswd = $_POST['cPassword'];

if ($passwd == $cpasswd) {
    $psw = password_hash($passwd, PASSWORD_DEFAULT);
    $data = [$uname, $psw];
    $d->insertData($data);

    header("Location: index.php?msg=success");
} else {
    header("Location: index.php?msg=not-match");
}
