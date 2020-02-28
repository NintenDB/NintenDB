<?php
$pageTitle = "All Games";
require('../../header.inc');
require('db_connect.php');

// $stmt = $pdo->query('SELECT * FROM games');]
$stmt = $pdo->query('SELECT name, franchise, console, genre, players, developer, publisher, year FROM games');








echo '<table cellspacing="0">';
$firstRow = true;

while ($row = $stmt->fetch()){

	// header //
	if($firstRow){
		echo '<tr>';
		foreach(array_keys($row) as $column){ echo "<th>$column</th>"; }
		echo '<tr>';
		$firstRow = false;
	}
	// items //
    echo "<tr>";
	foreach($row as $item){ echo "<td>$item</td>"; }
    echo "</tr>";


}



echo "</table>";

?>

<?php
require('../../footer.inc');
?>