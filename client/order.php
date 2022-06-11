<?php
include "../Database.php";

$d = new Database();
session_start();

$list = $d->getDataDetailCam();
$list2 = $d->getDataDetail();
if ($list->rowCount() > 0 && $list2->rowCount() > 0) {
    $list2->setFetchMode(PDO::FETCH_ASSOC);
    $listProduct = $list2->fetch();

    $list->setFetchMode(PDO::FETCH_ASSOC);
    $listCam = $list->fetch();

    $kodePesanan = rand(1, 10);
    $gambarClient = $listProduct['gambar'] . "," . $listCam['gambar'];
    $deskripsiClient = $listProduct['deskripsi'] . "," . $listCam['deskripsi'];
    $totalHarga = $listProduct['harga'] + $listCam['harga'];

    $data = [$kodePesanan, 2, $gambarClient, $deskripsiClient, $totalHarga];
    $idPisah = explode("|", base64_decode($_GET['idUser']));

    $cekuser = $d->cekAkun();
    $cekuser->setFetchMode(PDO::FETCH_ASSOC);
    $rs = $cekuser->fetch();
    if ($rs['nama'] === $_SESSION['uname']) {
        $kodeUser = [$kodePesanan, $idPisah[1]];
        $d->kodeUser($kodeUser);
        $d->orderAction($data);
    } else {
        echo "Goblok";
    }
}
header("Location: index.php?idUser=" . base64_encode(sha1(rand()) . "|" . $rs['id']));
