<?php
include "../Database.php";

$d = new Database();
session_start();

if (!isset($_GET['id'])) {
    $list = $d->getDataDetailCam();
    if ($list->rowCount() > 0) {

        $list->setFetchMode(PDO::FETCH_ASSOC);
        $listCam = $list->fetch();

        $kodePesanan = crc32(rand());

        $namaProduct = $listCam['nama'];
        $gambarClient = $listCam['gambar'];
        $deskripsiClient = $listCam['deskripsi'];
        $hargaClient = $listCam['harga'];
        $totalHarga = $listCam['harga'];

        $data = [$kodePesanan, 1, $namaProduct, $gambarClient, $deskripsiClient, $hargaClient, $totalHarga];
        $idPisah = explode("|", base64_decode($_GET['idUser']));

        $cekuser = $d->cekAkun();
        $cekuser->setFetchMode(PDO::FETCH_ASSOC);
        $rs = $cekuser->fetch();

        $kodeUser = [$kodePesanan, $idPisah[1]];
        $d->kodeUser($kodeUser);
        $d->orderAction($data);
    }
} else {
    $list = $d->getDataDetailCam();
    $list2 = $d->getDataDetail();
    if ($list->rowCount() > 0 && $list2->rowCount() > 0) {
        $list2->setFetchMode(PDO::FETCH_ASSOC);
        $listProduct = $list2->fetch();

        $list->setFetchMode(PDO::FETCH_ASSOC);
        $listCam = $list->fetch();

        $kodePesanan = crc32(rand());

        $namaProduct =  $listProduct['nama'] . "," . $listCam['nama'];
        $gambarClient = $listProduct['gambar'] . "," . $listCam['gambar'];
        $deskripsiClient = $listProduct['deskripsi'] . "," . $listCam['deskripsi'];
        $hargaClient = $listProduct['harga'] . "," . $listCam['harga'];
        $totalHarga = $listProduct['harga'] + $listCam['harga'];

        $data = [$kodePesanan, 2, $namaProduct, $gambarClient, $deskripsiClient, $hargaClient, $totalHarga];
        $idPisah = explode("|", base64_decode($_GET['idUser']));

        $cekuser = $d->cekAkun();
        $cekuser->setFetchMode(PDO::FETCH_ASSOC);
        $rs = $cekuser->fetch();

        $kodeUser = [$kodePesanan, $idPisah[1]];
        $d->kodeUser($kodeUser);
        $d->orderAction($data);
    }
}
header("Location: index.php?idUser=" . $_GET['idUser'] . "&kode_pesanan=" .  base64_encode(sha1(rand()) . "|" . $kodePesanan) . "#product");
