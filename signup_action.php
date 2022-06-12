<?php
include "database.php";

$d = new Database();

$uname = $_POST['username'];
$email = $_POST['email'];
$passwd = $_POST['password'];
$cpasswd = $_POST['cPassword'];

if ($passwd == $cpasswd) {
    $psw = password_hash($passwd, PASSWORD_DEFAULT);
    $data = [$uname, $email, $psw];

    $namaPisah = explode("@", $email);
    $namaPisah2 = explode(".", $namaPisah[1]);
    if ($namaPisah2[0] === "admin") {
        $d->insertAdmin($data);
    } else if ($namaPisah2[0] === "gmail") {
        $d->insertData($data);
    }

    header("Location: index.php?msg=success");
} else {
    header("Location: index.php?msg=not-match");
}
