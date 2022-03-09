<?php require 'assets/template/header.php';?>


    <main class="container">
        <div class="testbox">
            <form class="sign" method="post">
<p><?php echo $message ;?></p>
                <h2>Inscription</h2>
                
                <div class="item">
                    <label for="name">Login<span>*</span></label>
                    <input id="name" type="text" name="login" required />
                </div>

                <div class="item">
                    <label for="firstname">Prenom<span>*</span></label>
                    <input id="firstname" type="text" name="firstname" required />
                </div>

                <div class="item">
                    <label for="lastname">Nom<span>*</span></label>
                    <input id="lastname" type="text" name="lastname" required />
                </div>

                <div class="item">
                    <label for="email">Email<span>*</span></label>
                    <input id="email" type="email" name="email" required />
                </div>

                <div class="item">
                    <label for="password">Password:6 caractère minimum<span>*</span></label>
                    <input id="password" type="password" name="password" required />
                </div>

                <div class="btn-block">
                    <button name='sign_up' type="submit">sign up</button>
                </div>

        </div>
        </form>
        </div>
    </main>