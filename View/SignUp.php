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
    <link rel="stylesheet" href="./assets/css/signupMobile.css">
    <title>Document</title>
</head>
<body>
    <header style="width:100%;">
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#2c2c2c;" >
  <a class="" href="#">GASHIDO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="" href="#">inscription <span class="sr-only">(current)</span></a>
      <a class="" href="#">connexion</a>
      <a class="" href="#">product</a>
      <a class="" href="#">admin</a>
      <a class="" href="#">profil</a>
      <a class=""href="#">deconnexion</a>
    </div>
  </div>
</nav>

    <main class="">
         <form class="form" method="post">
        <div class="testbox">
           
<p><?php echo $message ;?></p>
<div class='title'>
                <h2>Inscription</h2>
   </div>             
                <!-- <div class="item">
                    <label for="name">Login<span>*</span></label>
                    <input id="name" type="text" name="login" required />
                </div> -->

                <div class="input-container ic1">
        <input id="name" class="input" type="text" placeholder=" "name="name" required />
        <div class="cut"></div>
        <label for="name" class="placeholder">Login</label>
      </div>

                <div class="input-container ic1">
        <input id="firstname" class="input" type="text" placeholder=" "name="firstname" required />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Prenom</label>
      </div>
                <!-- <div class="item">
                    <label for="firstname">Prenom<span>*</span></label>
                    <input id="firstname" type="text" name="firstname" required />
                </div> -->

                <div class="input-container ic1">
        <input id="lastname" class="input" type="text" placeholder=" "name="lastname" required />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">nom</label>
      </div>

                <!-- <div class="item">
                    <label for="lastname">Nom<span>*</span></label>
                    <input id="lastname" type="text" name="lastname" required />
                </div> -->

                <div class="input-container ic1">
        <input id="email" class="input" type="email" placeholder=" "name="email" required />
        <div class="cut"></div>
        <label for="email" class="placeholder">Email</label>
      </div>

                <!-- <div class="item">
                    <label for="email">Email<span>*</span></label>
                    <input id="email" type="email" name="email" required />
                </div> -->

                <div class="input-container ic1">
        <input id="password" class="input" type="password" placeholder=" "name="password" required />
        <div class="cut"></div>
        <label for="password" class="placeholder">Password:6 caractère minimum</label>
      </div>

                <!-- <div class="item">
                    <label for="password">Password:6 caractère minimum<span>*</span></label>
                    <input id="password" type="password" name="password" required /> -->
                </div>


                <div class="btn-block">
                    <button name='sign_up' type="submit" class='submit'>sign up</button>
                </div>

        </div>
        
        </div></form>
    </main>
</body>