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
        <form method="post" name='creationCat'>
            <input type="text" name="catName"></input>
            <input type="submit" name="createCat"></input>
        </form>
        <form method="post" name='deleteCateg'>
            <select name="idDel" >
                <?php
                $option = new Admin();
                $select = $option->displayCat();
                ?>
            </select>
            <input type="submit" name="deleteCat"></input>
        </form>
    </aricle>
    <article>
        <form method="post" name='createSubCat'>
            <input type="text" name="catSubName"></input>
            <select name="idCatForSub" >
                <?php
                $option = new Admin();
                $select = $option->displayCat();
                ?>
            </select>
            <input type="submit" name="createSubCat"></input>
        </form>
        <form method="post" name='deleteSubCateg'>
            <select name="idSubDel" >
                <?php
                $option = new Admin();
                $select = $option->displaySubCat();
                ?>
            </select>
        </form>
    </article>

</body>
</html>