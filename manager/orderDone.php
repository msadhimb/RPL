<?php
include "../Database.php";

$data = new Database();
$data->orderDone();

header("Location: user.php?idMngr=" . $_GET['idMngr']);
