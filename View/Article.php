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
    <link rel="stylesheet" href="../assets/css/article.css">
    <title>Document</title>
</head>
<?php ?>

<body class="artB">
    <header>

        <nav class="navbar navbar-expand-lg bg-dark">
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
                        <a class="nav-link" href="../Product">Les produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cart">Panier</a>
                    </li>
                    <?php
                    if (!(isset($_SESSION['user']))) {
                        echo "<li class='nav-item'>
                                    <a class='nav-link' href='../SignUp'>inscription</a>
                                </li>";
                    }
                    if (!(isset($_SESSION['user']))) {
                        echo "<li class='nav-item'>
                                    <a class='nav-link' href='../SignIn'>connexion</a>
                                </li>";
                    }
                    if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
                        echo "<li class='nav-item'>
                                    <a class='nav-link' href='../Profil'>profil</a>
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

 
</body>

</html>