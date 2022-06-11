<?php
include "database.php";

$username = $_POST['username'];
$password = $_POST['password'];

$data = [$username, $password];

$d = new Database();
$d->cekLogin($data);
