<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

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

