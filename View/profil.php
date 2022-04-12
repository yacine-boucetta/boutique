<?php require 'assets/template/header.php';?>


    <main class="container">
        <a href='./'>home</a>
        <div class="testbox">
            <form class="sign" method="post">
<p><?php echo $message ;?></p>
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
                    <label for="email">Email:<?php echo $_SESSION['user']['email'] ?></label>
                    <input id="email" type="email" name="email"  />
                </div>

                <div class="item">
                    <label for="password">Password:6 caractère minimum</label>
                    <input id="password" type="password" name="password"  />
                </div>

                <div class="item">
                    <label for="password">Veuillez valider votre mot de passe pour le modifier</label>
                    <input id="password" type="password" name="password2"  />
                </div>

                <div class="btn-block">
                    <button name='valider' type="submit">valider</button>
                </div>

        </div>
        </form>
        </div>
    </main>