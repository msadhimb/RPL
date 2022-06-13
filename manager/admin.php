<?php
include "../Database.php";

$d = new Database();
$data = $d->getDataAdmin();

$data->setFetchMode(PDO::FETCH_ASSOC);

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
                                        <a class="nav-link" href="user.php?idMngr=<?php echo $_GET['idMngr'] ?>">Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="admin.php?idMngr=<?php echo $_GET['idMngr'] ?>">Admin</a>
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

                <div class="container">
                    <div class="row mb-5">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <h2 align="center">Admin</h2>
                            <div class="border border-2 rounded-3 p-3">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($data as $ddata => $list) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $list['nama'] ?></td>
                                                <td><?php echo $list['email'] ?></td>
                                                <td><a class="btn btn-danger" href="deleteAdmin.php?idMngr=<?php echo $_GET['idMngr'] . "&idAdmin=" . base64_encode(sha1(rand()) . "|" . $list['id']) ?>">Delete</a></td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-4">
                            <a class="btn btn-success" href="signupAdmin.php">Add Admin</a>
                        </div>
                    </div>
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