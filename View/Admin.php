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
        <form method="post" name='formAjout'>
            <select name="addSelect">
                <?php
                //$option = new Admin();
                $option->displayCat();
                ?>
            </select>
            <input type="submit" name="inputSelect"></input>
        </form>
        <?php
            $option->addForm();
        ?>
    </article>

</body>
</html>