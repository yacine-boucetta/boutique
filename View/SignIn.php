<?php require 'assets/template/header.php';?>


    <main class="container">
        <div class="testbox">
            <form class="sign" method="post">
                <p><?php echo $message; ?></p>
                <h2>connexion</h2>

                <div class="item">
                    <label for="name">Login<span>*</span></label>
                    <input id="name" type="text" name="login" required />
                </div>

                <div class="item">
                    <label for="password">Mot de passe<span>*</span></label>
                    <input id="password" type="password" name="password" required />
                </div>

                <div class="btn-block">
                    <button name='signIn' type="submit">connexion</button>
                </div>
        </div>
        </form>
        </div>
    </main>