<?php
include "../Database.php";

$d = new Database();
$data = $d->getOrder();
$data2 = $d->getDataUser();

$data->setFetchMode(PDO::FETCH_ASSOC);
$data2->setFetchMode(PDO::FETCH_ASSOC);

session_start();
if ($_SESSION['isLogin'] != true || $_SESSION['jam_selesai'] == date("Y-m-d H:i:s")) {
    header("Location: ../index.php?message=nologin");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fotoin.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <!-- Awal Navbar -->
                <section id="homenavbar">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container">
                            <a class="navbar-brand fw-bold">Fotoin.com (Manager)</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="index.php?idMngr=<?php echo $_GET['idMngr'] ?>">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin.php?idMngr=<?php echo $_GET['idMngr'] ?>">Admin</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-danger text-white" href="../logout.php">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </section>
                <!-- Akhir Navbar -->

                <div class="container mt-5">
                    <?php
                    if ($data->rowCount() > 0) {
                        $user2 = $data->fetch();

                        $user = $data2->fetch();
                        if ($user2['pesanan'] <= 1) {
                    ?>
                            <h2 class="mb-3"><?php echo $user['nama'] ?></h2>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-5">
                                    <img src="assets/<?php echo $user2['gambar'] ?>" alt="" width="364px" height="264">
                                </div>
                                <div class="col-md-5">
                                    <h2><?php echo $user2['nama'] ?></h2>
                                    <p style="font-size: 20px;"><?php echo $user2['deskripsi'] ?></p>
                                    <h1 style="font-size: 20px;">Rp. <?php echo $user2['totalHarga'] ?></h1>
                                </div>
                                <div class="row d-flex justify-content-end">
                                    <h1 class="text-end">Rp. <?php echo $user2['totalHarga'] ?></h1>
                                </div>
                            </div>
                        <?php } else {
                            $namaProduct = explode(",", $user2['nama']);
                            $gambarPisah = explode(",", $user2['gambar']);
                            $deskripsiPisah = explode(",", $user2['deskripsi']);
                            $hargaPisah = explode(",", $user2['harga']);

                        ?>
                            <h2 class="mb-3"><?php echo $user['nama'] ?></h2>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-5">
                                    <img src="assets/<?php echo $gambarPisah[0] ?>" alt="" width="364px" height="264">
                                </div>
                                <div class="col-md-5">
                                    <h2><?php echo $namaProduct[0] ?></h2>
                                    <p style="font-size: 20px;"><?php echo $deskripsiPisah[0] ?></p>
                                    <h3 style="font-size: 20px;">Rp. <?php echo $hargaPisah[0] ?></h3>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-5">
                                    <img src="assets/<?php echo $gambarPisah[1] ?>" alt="" width="364px" height="264">
                                </div>
                                <div class="col-md-5">
                                    <h2><?php echo $namaProduct[1] ?></h2>
                                    <p style="font-size: 20px;"><?php echo $deskripsiPisah[1] ?></p>
                                    <h3 style="font-size: 20px;">Rp. <?php echo $hargaPisah[1] ?></h3>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <h1 class="text-end">Rp. <?php echo $user2['totalHarga'] ?></h1>
                            </div>
                    <?php }
                    } ?>
                </div>

                <!-- Garis -->
                <div class="container mt-5 mb-1">
                    <hr style="width: 100%; text-align: left; margin-left: 0" />
                </div>

                <!-- Awal Footer -->
                <p align="center" class="pb-0">
                    Created with
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd" d="M7.655 14.916L8 14.25l.345.666a.752.752 0 01-.69 0zm0 0L8 14.25l.345.666.002-.001.006-.003.018-.01a7.643 7.643 0 00.31-.17 22.08 22.08 0 003.433-2.414C13.956 10.731 16 8.35 16 5.5 16 2.836 13.914 1 11.75 1 10.203 1 8.847 1.802 8 3.02 7.153 1.802 5.797 1 4.25 1 2.086 1 0 2.836 0 5.5c0 2.85 2.045 5.231 3.885 6.818a22.075 22.075 0 003.744 2.584l.018.01.006.003h.002z"></path>
                    </svg>
                    by Urra Team
                </p>
                <!-- Akhir Footer -->
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>

</html>