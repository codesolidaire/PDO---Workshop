<?php
require_once __DIR__ . '/_connec.php';

$pdo = new \PDO(DSN, USER, PASS);


if ($_POST != True) {
    echo "Merci de remplir le formulaire:<br><br>";
    $title = null;
    $content = null;
    $author = null;
} else {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
}



$query = "INSERT INTO `story` (title, content, author) VALUES ('$title','$content','$author')";
$statement = $pdo->prepare($query);

$statement->bindValue(':title', $title, PDO::PARAM_STR);
$statement->bindValue(':content', $content, PDO::PARAM_STR);
$statement->bindValue(':author', $author, PDO::PARAM_STR);

$statement->execute(); // Execute a prepared request
//print_r($_POST);

$story = $statement->fetchAll();
//print_r($statement);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="create.php" method="post">
            <div>
                <label for="title">Title</label>
                <div>
                    <input id="title" name="title" class="input" type="text" maxlength="255">
                </div>
            </div>
            <div>
                <label for="content">Content</label>
                <div>
                    <input id="content" name="content" class="input" type="text">
                </div>
            </div>
            <div>
                <label for="author">Author</label>
                <div>
                    <input id="author" name="author" class="input" type="text" maxlength="100">
                </div>
            </div>
            <div>
                <button  type="submit">Envoyer</button>
            </div>
        </form>
    </div>
</body>
</html>