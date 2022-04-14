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
    <link rel="stylesheet" href="./assets/css/admin.css">
    <title>Document</title>
</head>
<?php ?>

<body>
<header style="color: white;">

    <nav class="navbar navbar-expand-lg ">
  <a  href="#">GASHIDO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Acceuil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Les produits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">admin</a>
      </li>

    </ul>
  </div>
</nav>

    </header>
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