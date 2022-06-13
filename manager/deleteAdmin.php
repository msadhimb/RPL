<?php
include "../Database.php";

$data = new Database();
$data->deleteAdmin();

header("Location: admin.php?idMngr=" . $_GET['idMngr']);
