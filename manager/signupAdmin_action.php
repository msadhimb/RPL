<?php
include "../database.php";

$d = new Database();

$uname = $_POST['username'];
$email = $_POST['email'];
$passwd = $_POST['password'];
$cpasswd = $_POST['cPassword'];

if ($passwd == $cpasswd) {
    $psw = password_hash($passwd, PASSWORD_DEFAULT);
    $data = [$uname, $email, $psw];

    $d->insertAdmin($data);
    header("Location: admin.php?idMngr=" . $_GET['Mngr']);
} else {
    header("Location: signupAdmin.php?msg=not-match");
}
