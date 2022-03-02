<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ADMIN</h1>
    <aricle>
        <h2>Creation de categorie</h2>
        <form method="post" name='creationCat'>
            <input type="text" name="catName"></input>
            <input type="submit" name="createCat"></input>
        </form>
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
    </aricle>
    <article>
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
    <article>
        <h2>Ajout Produits</h2>
        <form method='POST' enctype='multipart/form-data'>
            <select name="addSelect">
                <?php
                //$option = new Admin();
                $option->displayCat();
                ?>
            </select>
            <input type="submit" name="inputSelect"></input>
        <?php
            $option->addForm();
        ?>
        </form>
    </article>
    <article>
        <h2>Modification de produits</h2>
        <form method='POST' enctype='multipart/form-data'>
            <select name='upSelect'>
                <?php
                    //$option = new Admin();
                    $option->prodSelect();
                ?>
                <input type="submit" name="updateSelect"></input>
            </select>
            <?php
                $option->addUpForm();
            ?>

        </form>
    </article>
</body>
</html>