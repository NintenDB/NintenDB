<style>
	th {
    text-align: left;
    padding: 6px 4px 6px 0px;
    border-bottom: 1px solid grey;
	}
</style>

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

// $stmt = $pdo->query('SELECT * FROM games');]
$stmt = $pdo->query('SELECT name, franchise, console, genre, players, developer, publisher, year FROM games');








echo '<table cellspacing="0">';
$firstRow = true;

while ($row = $stmt->fetch()){
	echo "<tr>";
	// todo nicer way to do this? 
	if($firstRow){
		echo '<tr class="firstRow">';
		foreach(array_keys($row) as $column){
			echo "<th>$column</th>";
		}
		$firstRow = false;
	}else{
		foreach($row as $item){
			echo "<td>$item</td>";
		}
	}
	echo "</tr>";

}



echo "</table>";







echo "<pre>\n";

while ($row = $stmt->fetch()){
	// echo $row['name']."<br>\n";
	
	print_r($row);
	
	// echo "<br><br>\n";
}

echo "</pre>\n";






?>