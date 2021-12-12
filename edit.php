<?php
require_once __DIR__ . '/_connec.php';

$pdo = new PDO(DSN, USER, PASS);

$query = "SELECT * FROM story";
$statement = $pdo->query($query);
$stories = $statement->fetchAll(PDO::FETCH_ASSOC);

//print_r($stories);

/* Création table
$query = 'CREATE TABLE story
(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	title VARCHAR(255),
	content TEXT,
	author VARCHAR(100)
)';
$statement = $pdo->exec($query);
*/

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            text-align: center;
            border: solid;
        }
        td {
            border: 1px solid #333;
        }

        thead,
        tfoot {
            background-color: #333;
            color: #fff;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div>
        <form action="edit.php" method="get">
            <div>
                <label for="id">Identifiant de l'histoire:</label>
                <div>
                    <select id="id" name="id">
                        <option>Choisir une histoire:</option>
                        <?php
                        foreach ($stories as $story) { ?>
                            <option value="<?= "$story[id]";?>"><?= "$story[id]";?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
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
                    <input id="author" name="author" class="input" type="text" maxlength="100"><br><br>
                </div>
            </div>
            <div>
                <button  type="submit">Mettre à jour?</button>
                <br><br>
            </div>
        </form>
    </div><br>
    <div>
        <form action="edit.php" method="post">

            <div>
                <label for="id">Identifiant de l'histoire:</label><br><br>
                <div>
                    <select id="id" name="id">
                        <option>Choisir une histoire:</option>
                        <?php
                        foreach ($stories as $story) { ?>
                            <option value="<?= "$story[id]";?>"><?= "$story[id]";?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div>
                <button  type="submit">Supprimer ?</button>
            </div>

        </form>
    </div><br>
    <table>
        <thead>
        <tr>
            <th colspan="1">Identifiant:</th>
            <th colspan="1">Titre:</th>
            <th colspan="1">Histoire:</th>
            <th colspan="1">Auteur:</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($stories as $story){
            echo "<tr><td>$story[id]</td>";
            echo "<td>$story[title]</td>";
            echo "<td>$story[content]</td>";
            echo "<td>$story[author]</td></tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
