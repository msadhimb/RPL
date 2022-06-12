<?php
include "database.php";

$email = $_POST['email'];
$password = $_POST['password'];

$data = [$email, $password];

$d = new Database();
$d->cekLogin($data);
