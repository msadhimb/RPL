<?php
include "../Database.php";

$namaGambar = $_FILES['bukti']['name'];
$lokasiGambar = $_FILES['bukti']['tmp_name'];

move_uploaded_file($lokasiGambar, 'bukti_transfer/' . $namaGambar);

$idPisah = explode("|", base64_decode($_GET['idUser']));
$data = ([$namaGambar, $idPisah['1']]);

$d = new Database();
$d->insertBuktiTransfer($data);

header("Location: index.php?idUser=" . $_GET['idUser'] . "#product");
