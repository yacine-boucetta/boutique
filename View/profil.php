<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <main class="container">
        <a href='./'>home</a>
        <div class="testbox">
            <form class="sign" method="post">
<p><?php var_dump($_SESSION['user']);
echo $message ;?></p>
                <h2>Profil</h2>
                
                <div class="item">
                    <label for="name" value>Login:<?php echo $_SESSION['user']['login'] ?></label>
                    <input id="name" type="text" name="login"  />
                </div>

                <div class="item">
                    <label for="firstname">Prenom:<?php echo $_SESSION['user']['prenom'] ?></label>
                    <input id="firstname" type="text" name="firstName"  />
                </div>

                <div class="item">
                    <label for="lastname">Nom:<?php echo $_SESSION['user']['nom'] ?></label>
                    <input id="lastname" type="text" name="lastName" />
                </div>

                <div class="item">
                    <label for="email">Email:<?php echo $_SESSION['user']['email'] ?><span>*</span></label>
                    <input id="email" type="email" name="email"  />
                </div>

                <div class="item">
                    <label for="password">Password:6 caractère minimum</label>
                    <input id="password" type="password" name="password"  />
                </div>

                <div class="item">
                    <label for="password">Veuillez valider votre mot de passe pour le modifier<span>*</span></label>
                    <input id="password" type="password2" name="password"  />
                </div>

                <div class="btn-block">
                    <button name='sign_up' type="valider">valider</button>
                </div>

        </div>
        </form>
        </div>
    </main>