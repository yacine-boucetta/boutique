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