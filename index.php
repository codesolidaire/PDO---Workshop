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
        table { border: solid;}
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
    <table>
        <thead>
            <tr>
                <th colspan="1">Titre:</th>
                <th colspan="1">Histoire:</th>
                <th colspan="1">Auteur:</th>
            </tr>
        </thead>
        <tbody>
        <?php
                foreach ($stories as $story){
                echo "<tr><td>$story[title]</td>";
                echo "<td>$story[content]</td>";
                echo "<td>$story[author]</td></tr>";
                }
        ?>
        </tbody>
    </table>
</body>
</html>
