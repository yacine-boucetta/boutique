<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="text"><input type="text"><input type="text"><input type="text"><input type="text"><input type="text"><input type="text">
    </form>
    <p>
    
    <?=
        $article=new Article;
        $test=$article->GetArticle($url[1]);
    ?>
    </p>
</body>
</html>