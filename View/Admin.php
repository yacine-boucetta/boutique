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
    <main>
    <h1>ADMIN</h1>
    <h3 style="color:red"><?php echo $message; ?></h3>
    <h3 style="color:red"><?php echo $results; ?></h3>
    <h3 style="color:red"><?php echo $resulta; ?></h3>
    <h3 style="color:red"><?php echo $resultas; ?></h3>
    <section id='secCat'>
        <article id='artCategCreat'>
            <h2>Creation de categorie</h2>
            <form method="post" name='creationCat'>
                <input type="text" name="catName"></input>
                <input type="submit" name="createCat"></input>
            </form>
        </article>
        <article id='artCategUpdate'>
            <h2>Update de categories</h2>
            <form method='POST'>
                <select name='upCategoProd'>
                    <option value="" disabled selected>Select your option</option>
                    <?php
                            $option = new Admin();
                            $option->prodSelect();
                            ?>
                </select>
                <select name='idCategoUp'>
                    <option value="" disabled selected>Select your option</option>
                    <?php
                        $option->displayCat();
                        ?>
                </select>
                <select name='idSubCategoUp'>
                    <option value='' disabled selected>Select your option</option>
                    <?php
                        $option->displayNameCat();
                        ?>
                </select>
                <input type='submit' name='updateCat'></input>
            </form>
        </article>
        <article id='updateCateg'>
            <h2>Suppresion de categories</h2>
            <form method="post" name='deleteCateg'>
                <select name="idDel" >
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
                <form method="post" name='createSubCat'>
                    <input type="text" name="catSubName"></input>
                    <select name="idCatForSub" >
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
                <form method="post" name='deleteSubCateg'>
                    <select name="idSubDel" >
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
            <article id='addProd'>
                <h2>Ajout Produits</h2>
                    <form method='POST' enctype='multipart/form-data'>
                        <select name="addSelect">
                            <?php
                        //$option = new Admin();
                        $option->displayCat();
                        ?>
                    </select>
                    <input type='text' name='nom'></input>
                    <textarea name='description'></textarea>
                    <select name='idSousCat'> 
                        <?php
                        $option = new Admin;
                        $option->displayNameCat();
                        ?>
                    </select>
                    <input type='text' name='prix'></input>
                    <input type='file' name='image'></input>
                    <input type='submit' name='addProd'></input>
                </form>
            </article>
            <article id='updateProd'>
                <h2>Modification de produits</h2>
                <form method='POST' enctype='multipart/form-data'>
                    <select name='upSelect'>
                        <option value="" disabled selected>Select your option</option>
                        <?php
                            $option = new Admin();
                            $option->prodSelect();
                        ?>
                </select>
                <input type='text' name='nom'></input>
                <textarea name='upDescription'></textarea>             
                <input type='text' name='upPrix'></input>
                <input type='submit' name='updateProd'></input>
            </form> 
        </article>
        <article>
            <h2>Update d'image</h2>
            <form method='POST' enctype='multipart/form-data'>
                <select name='upImgProd'>
                    <option value="" disabled selected>Select your option</option>
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
            <form method='POST'>
                <select name='idDelete'>
                    <option value="" disabled selected>Select your option</option>
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
        <form method='POST'>
            <select name='idUserRight'>
                <option value="" disabled selected>Select your option</option>
                <?php
                        $option = new Admin();
                        $option->displayUser();
                        ?>
            </select>
            <select name='idRight'>
                <option value="" disabled selected>Select your option</option>
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