<?php

$charset = "utf8mb4";
$db = "nintendb";

// $host = "localhost";
// $user = "root";
// $pass = "";

$host = "mysql.nintendb.xyz";
$user = "nintendb";
$pass = "Mindustry11";

$options = [
	\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
	\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
	\PDO::ATTR_EMULATE_PREPARES => false
];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
	$pdo = new \PDO($dsn, $user, $pass, $options);
}catch (\PDOException $e){
	throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->query('SELECT * FROM games');

echo "<pre>\n";

while ($row = $stmt->fetch()){
	// echo $row['name']."<br>\n";
	
	print_r($row);
	
	// echo "<br><br>\n";
}

echo "</pre>\n";
?>