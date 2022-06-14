<?php session_start();
if ($_SESSION['isLogin'] != true || $_SESSION['jam_selesai'] == date("Y-m-d H:i:s")) {
  header("Location: ../index.php?message=nologin");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              <a class="navbar-brand fw-bold">Fotoin.com (Admin)</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#homenavbar">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="user.php?idAdmin=<?php echo $_GET['idAdmin'] ?>">Users</a>
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

        <!-- Awal Judul -->
        <section id="judul">
          <div class="container">
            <div class="row mt-4">
              <div class="col-7 mt-4">
                <h1>
                  <strong> The Best Fotografer </strong><br />
                  <p class="gadget">In Your Gadget</p>
                </h1>
                <p style="font-size: 20">Let's choose the camera or photo service you want!</p>
                <a href="#product" class="btn btn-lg btn-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                    <path fill-rule="evenodd" d="M8.22 2.97a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06l2.97-2.97H3.75a.75.75 0 010-1.5h7.44L8.22 4.03a.75.75 0 010-1.06z"></path>
                  </svg>
                  Order
                </a>
              </div>
              <div class="col-5">
                <img src="assets/camera.png" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </section>
        <!-- Akhir Judul -->

        <!-- Garis -->
        <div class="container mt-5 mb-5">
          <hr style="width: 100%; text-align: left; margin-left: 0" />
        </div>

        <!-- Awal Best Product -->
        <section id="bestproduct">
          <div class="container">
            <h4>Best <strong>Product</strong></h4>
            <div class="row">
              <div class="col-5">
                <img src="assets/photoshoot.png" class="img-fluid" alt="">
              </div>
              <div class="col-7 mt-5">
                <h4 align="center">JASA FOTO</h4>
                <p align="center" style="font-size: 20px">Kami menyediakan berbagai macam jasa foto seperti foto bayi, prewedding, foto album kelas dan masih banyak lainnya</p>
              </div>
            </div>
            <div class="row">
              <div class="col-7 mt-5">
                <h4 align="center">SEWA KAMERA</h4>
                <p align="center" style="font-size: 20px">Drone, SLR, atau kebutuhan fotografi lainnya seperti tripod, stabilizer maupun lensa juga kami sediakan</p>
              </div>
              <div class="col-5">
                <img src="assets/drone.png" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </section>
        <!-- Akhir Best Product -->

        <!-- Garis -->
        <div class="container mt-5 mb-5">
          <hr style="width: 100%; text-align: left; margin-left: 0" />
        </div>

        <!-- Awal Product -->
        <section id="product">
          <div class="container">
            <h4>Our <strong>Product</strong></h4>
            <div class="row">
              <div class="col-4" align="center">
                <!-- Awal Product Jasa 1 -->
                <div class="card" style="width: 18rem; background-color: #f5f6fa">
                  <img src="assets/fotowisuda.png" class="card-img-top img-fluid" alt="..." />
                  <div class="card-body">
                    <h5 class="card-title">Jasa Foto Wisuda</h5>
                    <p class="card-text">Durasi Foto : 1jam / 2jam / 3jam</p>
                    <a class="btn btn-primary disabled">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd" d="M8.22 2.97a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06l2.97-2.97H3.75a.75.75 0 010-1.5h7.44L8.22 4.03a.75.75 0 010-1.06z"></path>
                      </svg>
                      Order</a>
                  </div>
                </div>
                <!-- Akhir Product Jasa 1 -->
              </div>
              <div class="col-4" align="center">
                <!-- Awal Product Jasa 2 -->
                <div class="card" style="width: 18rem; background-color: #f5f6fa">
                  <img src="assets/wedding.png" class="card-img-top img-fluid" alt="..." />
                  <div class="card-body">
                    <h5 class="card-title">Jasa Foto Prewedding</h5>
                    <p class="card-text">Durasi Foto : 2jam / 3jam / 4jam</p>
                    <a class="btn btn-primary disabled">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd" d="M8.22 2.97a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06l2.97-2.97H3.75a.75.75 0 010-1.5h7.44L8.22 4.03a.75.75 0 010-1.06z"></path>
                      </svg>
                      Order</a>
                  </div>
                </div>
                <!-- Akhir Product Jasa 2 -->
              </div>
              <div class="col-4" align="center">
                <!-- Awal Product Jasa 3 -->
                <div class="card" style="width: 18rem; background-color: #f5f6fa">
                  <img src="assets/fotobayi.png" class="card-img-top img-fluid" alt="..." />
                  <div class="card-body">
                    <h5 class="card-title">Jasa Foto Bayi</h5>
                    <p class="card-text">Durasi Foto : 2jam / 3jam / 4jam</p>
                    <a class="btn btn-primary disabled">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd" d="M8.22 2.97a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06l2.97-2.97H3.75a.75.75 0 010-1.5h7.44L8.22 4.03a.75.75 0 010-1.06z"></path>
                      </svg>
                      Order</a>
                  </div>
                </div>
                <!-- Akhir Product Jasa 3 -->
              </div>
            </div>
            <br />
            <div class="row">
              <h4 class="mt-5 mb-3">Or You Just Want To<strong> Rent Our Item</strong></h4>
              <div class="col-4" align="center">
                <!-- Awal Product 1 -->
                <div class="card" style="width: 18rem; background-color: #f5f6fa">
                  <img src="assets/dronev3.png" class="card-img-top img-fluid" alt="..." />
                  <div class="card-body">
                    <h5 class="card-title">Drone v3 Pro</h5>
                    <p class="card-text">
                      Frekuensi : 2.4ghz <br />
                      Waktu terbang : 30menit <br />
                      jangkauan : 100m <br />
                      FPV Wifi Camera
                    </p>
                    <a class="btn btn-primary disabled">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd" d="M8.22 2.97a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06l2.97-2.97H3.75a.75.75 0 010-1.5h7.44L8.22 4.03a.75.75 0 010-1.06z"></path>
                      </svg>
                      Order</a>
                  </div>
                </div>
                <!-- Akhir Product 1 -->
              </div>
              <div class="col-4" align="center">
                <!-- Awal Product 2 -->
                <div class="card" style="width: 18rem; background-color: #f5f6fa">
                  <img src="assets/canon.png" class="card-img-top img-fluid" alt="..." />
                  <div class="card-body">
                    <h5 class="card-title">Canon EOS m3</h5>
                    <p class="card-text">
                      Camera pixel : 24.2 MP <br />
                      Video : FullHD 1080p 60fps <br />
                      ISO 100-12800 <br />
                      Lensa : EF 15-45mm f/3.5-5.6 IS
                    </p>
                    <a class="btn btn-primary disabled">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd" d="M8.22 2.97a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06l2.97-2.97H3.75a.75.75 0 010-1.5h7.44L8.22 4.03a.75.75 0 010-1.06z"></path>
                      </svg>
                      Order</a>
                  </div>
                </div>
                <!-- Akhir Product 2 -->
              </div>
              <div class="col-4" align="center">
                <!-- Awal Product 3 -->
                <div class="card" style="width: 18rem; background-color: #f5f6fa">
                  <img src="assets/tripod.png" class="card-img-top img-fluid" alt="..." />
                  <div class="card-body">
                    <h5 class="card-title">Zomei Q111</h5>
                    <p class="card-text">
                      Folded length : 50cm <br />
                      Max Height : 145cm <br />
                      Max Load : 5kg <br />
                      Tube diameter : 20mm
                    </p>
                    <a class="btn btn-primary disabled">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd" d="M8.22 2.97a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06l2.97-2.97H3.75a.75.75 0 010-1.5h7.44L8.22 4.03a.75.75 0 010-1.06z"></path>
                      </svg>
                      Order</a>
                  </div>
                </div>
                <!-- Akhir Product 3 -->
              </div>
            </div>
          </div>
        </section>
        <!-- Akhir Product -->

        <!-- Garis -->
        <div class="container mt-5 mb-1">
          <hr style="width: 100%; text-align: left; margin-left: 0" />
        </div>

        <!-- Awal Footer -->
        <p align="center">
          Created with
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
            <path fill-rule="evenodd" d="M7.655 14.916L8 14.25l.345.666a.752.752 0 01-.69 0zm0 0L8 14.25l.345.666.002-.001.006-.003.018-.01a7.643 7.643 0 00.31-.17 22.08 22.08 0 003.433-2.414C13.956 10.731 16 8.35 16 5.5 16 2.836 13.914 1 11.75 1 10.203 1 8.847 1.802 8 3.02 7.153 1.802 5.797 1 4.25 1 2.086 1 0 2.836 0 5.5c0 2.85 2.045 5.231 3.885 6.818a22.075 22.075 0 003.744 2.584l.018.01.006.003h.002z"></path>
          </svg>
          by Fotoin.com
        </p>
        <!-- Akhir Footer -->
      </div>
      <div class="col-1"></div>
    </div>
  </div>
</body>

</html>