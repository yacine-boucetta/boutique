<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="./assets/css/home.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/signinMobile.css">
  <title>Document</title>
</head>

<body>
  <header>

    <nav class="navbar navbar-expand-lg bg-light">
    <a class="navbar-brand" href="./">GASHIDO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="./">Acceuil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Product">Les produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./cart">Panier</a>
          </li>
          <?php
          if (!(isset($_SESSION['user']))) {
            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./SignUp'>inscription</a>
                                </li>";
          }
          if (!(isset($_SESSION['user']))) {
            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./SignIn'>connexion</a>
                                </li>";
          }
          if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./Profil'>profil</a>
                                </li>";
          }
          if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
            echo "<li class='nav-item'>
                        <a class='nav-link' href='View/deconnexion.php'>Deconnexion</a>
                    </li>";
        }
          if (isset($_SESSION['user']) && $_SESSION['user'] == "2") {
            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./Admin'>admin</a>
                                </li>";
          }
          ?>
        </ul>
      </div>
    </nav>

  </header>
  <main class="">

    <form class="form" method="post">
      <div class="testbox">
        <p><?php echo $message; ?></p>
        <h2>Connexion</h2>

        <!-- <div class="item">
                    <label for="name">Login<span>*</span></label>
                    <input id="name" type="text" name="login" required />
                </div> -->

        <div class="input-container ic1">
          <input id="name" class="input" type="text" placeholder=" " name="login" required />
          <div class="cut"></div>
          <label for="login" class="placeholder">Login</label>
        </div>

        <!-- <div class="item">
                    <label for="password">Mot de passe<span>*</span></label>
                    <input id="password" type="password" name="password" required />
                </div> -->

        <div class="input-container ic1">
          <input id="password" class="input" type="password" placeholder=" " name="password" required />
          <div class="cut"></div>
          <label for="password" class="placeholder">Password</label>
        </div>

        <div class="btn-block">
          <button name='signIn' class='submit' type="submit">connexion</button>
        </div>
      </div>
    </form>
    </div>
  </main>
  <footer class="bg-light text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Gashido</h5>

          <p>
          Gashido knife makers offers you a wide range of japanesse pocket knives 
                    handmade in France.
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Gashido</h5>

                    <p>
                        
                    Welcome to our 3rd edition of the USAknifemaker.com catalog. 
                    This release weighs in at nearly double the page count of our 
                    first catalog with the addition of thousands of new items since our first release.
                    Our goal is simple. We want to be the very best supplier for you in your knife making hobby or profession.
          </p>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/%22%3EMDBootstrap.com"></a>
    </div>
    <!-- Copyright -->
  </footer>

</body>

</html>