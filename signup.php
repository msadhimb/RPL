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
              <a class="navbar-brand fw-bold">Fotoin.com</a>
            </div>
          </nav>
        </section>
        <!-- Akhir Navbar -->

        <div class="container">
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
              <h2 class="mb-4" align="center">Sign Up</h2>
              <?php
              if (isset($_GET['msg'])) {
                if ($_GET['msg'] == 'not-match') {
              ?>
                  <div class="alert alert-danger text-center">Password dan Confirm password tidak cocok</div>
                <?php } else if ($_GET['msg'] == 'admin') { ?>
                  <div class="alert alert-danger text-center">Anda harus menggunakan gmail</div>
              <?php }
              } ?>
              <div class="border border-2 rounded-4 p-3">
                <form method="post" action="signup_action.php">
                  <!-- Username input -->
                  <label class="form-label" for="form2Example1">Username</label>
                  <div class="form-outline mb-4">
                    <input id="form2Example1" class="form-control" name="username" />
                  </div>

                  <!-- Email input -->
                  <label class="form-label" for="form2Example1">Email</label>
                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example1" class="form-control" name="email" />
                  </div>

                  <!-- Password input -->
                  <label class="form-label" for="form2Example2">Password</label>
                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" name="password" />
                  </div>

                  <!-- Password Confirminput -->
                  <label class="form-label" for="form2Example2">Confirm Password</label>
                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" name="cPassword" />
                  </div>

                  <!-- Submit button -->
                  <div class="d-grid gap-2 col-2 mx-auto">
                    <input class="btn btn-primary" value="Sign Up" type="submit">
                  </div>
                </form>
                <div class="row d-flex justify-content-end">

                  <a class="text-end" href="index.php">Sign In</a>
                </div>
              </div>
            </div>
            <div class="col-2"></div>
          </div>
        </div>

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
          by Urra Team
        </p>
        <!-- Akhir Footer -->
      </div>
      <div class="col-1"></div>
    </div>
  </div>
</body>

</html>