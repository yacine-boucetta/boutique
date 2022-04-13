<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <h1> GASHIDO </h1>
            <ul>
                <li><a href='./SignUp'>inscription</a></li>
                <li><a href='./SignIn'>connexion</a></li>
                <li><a href='./Product'>product</a></li>
                <li><a href='./Admin'>admin</a></li>
                <li><a href='./Profil'>profil</a></li>
                <li><a href='./Deconnexion'>deconnexion</a></li>
            </ul>
            <form action="" method="post">
	            <input type="text" name="query" />
	            <input type="submit" value="Search" />
            </form>
        </nav>
    </header>
<body>
    <main>
    <h2 id='admin'>ADMIN</h2>
    <h3 style="color:red"><?php echo $message; ?></h3>
    <h3 style="color:red"><?php echo $results; ?></h3>
    <h3 style="color:red"><?php echo $resulta; ?></h3>
    <h3 style="color:red"><?php echo $resultas; ?></h3>
    <section id='secCat'>
        <article id='artCategCreat'>
            <h2>Creation de categorie</h2>
            <form method="post" name='creationCat'>
                <input type="text" name="catName" placeholder="Nouveau nom de categorie"></input>
                <input type="submit" name="createCat"></input>
            </form>
        </article>
        <article id='artCategUpdate'>
            <h2>Update categories de produits</h2>
            <form method='POST' class='formAdmin'>
                <select name='upCategoProd'>
                    <option value="" disabled selected>Choisisez un produit</option>
                    <?php
                            $option = new Admin();
                            $option->prodSelect();
                            ?>
                </select>
                <select name='idCategoUp'>
                    <option value="" disabled selected>Choisiez une categorie</option>
                    <?php
                        $option->displayCat();
                        ?>
                </select>
                <select name='idSubCategoUp'>
                    <option value='' disabled selected>Choisiez une sous categories</option>
                    <?php
                        $option->displayNameCat();
                        ?>
                </select>
                <input type='submit' name='updateCat'></input>
            </form>
        </article>
        <article id='updateCateg'>
            <h2>Suppresion de categories</h2>
            <form method="post" name='deleteCateg' class='formAdmin'>
                <select name="idDel" >
                <option value='' disabled selected>Choisiez une categorie a supprimer</option>
                    <?php
                $option = new Admin();
                $var = $option->displayCat();
                ?>
            </select>
            <input type="submit" name="deleteCat"></input>
            </form>
        </article>
    </section>
        <section id='secSubCateg'>
            <article id='createSubCat'>
                <h2>Creation de Sub categorie</h2>
                <form method="post" name='createSubCat' class='formAdmin'>
                    <input type="text" name="catSubName" placeholder="Choisisez un nom de sous categorie"></input>
                    <select name="idCatForSub" >
                    <option value='' disabled selected>Chosisez une categorie</option>
                        <?php
                        //$option = new Admin();
                        $option->displayCat();
                        ?>
                    </select>
                    <input type="submit" name="createSubCat"></input>
                </form>
            </article>
            <article id='deleteSubCat'>
                <h2>Suppresion de Sub categorie</h2>
                <form method="post" name='deleteSubCateg' class='formAdmin'>
                    <select name="idSubDel" >
                    <option value='' disabled selected>Choisiez une sous categorie a supprimer</option>
                        <?php
                        //$option = new Admin();
                        $option->displaySubCat();
                        ?>
                    </select>
                    <input type="submit" name="deleteSubCateg"></input>
                </form>
            </article>
        </section>
    </article>
        <section id='secProd'>
            <article id='artaddProd'>
                <h2>Ajout Produits</h2>
                <div class="divProd">
                    <form method='POST' enctype='multipart/form-data' class='formAdmin'>
                            <select name="addSelect">
                                <option value="" disabled selected>Choisiez une categorie</option>
                                <?php
                                //$option = new Admin();
                                    $option->displayCat();
                                ?>
                            </select>
                        </div>
                        <!-- <div class="divProd"> -->
                            <select name='idSousCat'> 
                                <option value='' disabled selected>Choisiez une sous categories</option>
                                <?php
                                    $option = new Admin;
                                    $option->displayNameCat();
                                ?>
                            </select>
                        <!-- </div> -->
                    <input class='inputProd' type='text' name='nom' placeholder='Nom de produit'></input>
                    <textarea class='inputProd' name='description' style="resize: none;" placeholder='Description du produit'></textarea>
                    <input class='inputProd' type='text' name='prix' placeholder="Prix du produit"></input>
                    <input class='inputProd' type='file' name='image'></input>
                    <input type='submit' name='addProd'></input>
                </form>
            </article>
            <article id='updateProd'>
                <h2>Modification de produits</h2>
                <div class="divProd">
                <form method='POST' enctype='multipart/form-data' class='formAdmin'>
                    <select name='upSelect'>
                        <option value="" disabled selected>Choisisez un produit</option>
                        <?php
                            $option = new Admin();
                            $option->prodSelect();
                        ?>
                </select>
                </div>
                <input class='inputProd' type='text' name='nom' placeholder='Nouveau nom de produit'></input>
                <textarea class='inputProd' name='upDescription' style="resize: none;" placeholder='Nouvelle description du produit'></textarea>             
                <input class='inputProd' type='text' name='upPrix' placeholder="nouveau prix" ></input>
                <input class='inputProd' type='submit' name='updateProd'></input>
            </form> 
        </article>
        <article id='artUpdateImg'>
            <h2>Update d'image</h2>
            <form method='POST' enctype='multipart/form-data' class='formAdmin'>
                <select name='upImgProd'>
                    <option value="" disabled selected>Choisez une nouvelle image de produit</option>
                    <?php
                        $option = new Admin();
                        $option->prodSelect();
                        ?>
                </select>
                <input type='hidden' name ='nom'></input>
                <input type='file' name='image'></input>
                <input type='submit' name='updateImage'></input>
            </form>
        </article>
    </section>
    <section id='secUser'>
        <article id='deleteUser'>
            <h2>Effacer un utilisateur</h2>
            <form method='POST' class='formAdmin'>
                <select name='idDelete'>
                    <option value="" disabled selected>Choisisez un utilisateur a supprimer</option>
                    <?php
                        $option = new Admin();
                        $option->displayUser();
                        ?>
            </select>
            <input type='submit' name='deleteUser'></input>
        </form>
    </article>
    <article id='modUser'>
        <h2>Update droit user</h2>
        <form method='POST' class='formAdmin'>
            <select name='idUserRight'>
                <option value="" disabled selected>Choisisez un utilisateur a modfier</option>
                <?php
                        $option = new Admin();
                        $option->displayUser();
                        ?>
            </select>
            <select name='idRight'>
                <option value="" disabled selected>Choisisez un droits</option>
                <option value="1">User</option>
                <option value="2">Admin</option>
            </select>
            <input type='submit' name='modUser'></input>
        </form>
    </article>
</section>
</main>
</body>
</html>