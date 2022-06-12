<?php
include "../Database.php";

$data = new Database();
$data->orderDone();

header("Location: user.php?idAdmin=" . $_GET['idAdmin']);
