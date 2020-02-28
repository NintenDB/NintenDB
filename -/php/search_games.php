<?php
$pageTitle = "Search Games";
require('../../header.inc');
require('db_connect.php');

?>

<h2>Search by name</h2>

    <br><br>
<form method="get">
    <label for="name">Name</label> <br>
    <input name="name" type="text"> <br>

    <input name="submit" type="submit">
</form>


<?php // Search Results

if (isset($_GET['q'])) {
    $namequery = $_GET['q'];

    $namequery = '%' . $namequery . '%';

    echo "Searching for " . $namequery . "<br>\n";

    $stmt = $pdo->prepare('SELECT * FROM games WHERE name LIKE :namequery');
    $stmt->execute(['namequery' => $namequery]);


    echo '<table cellspacing="0">';
    $firstRow = true;

    while ($row = $stmt->fetch()) {
        echo "<tr>";
        // todo nicer way to do this?
        if ($firstRow) {
            echo '<tr class="firstRow">';
            foreach (array_keys($row) as $column) {
                echo "<th>$column</th>";
            }
            $firstRow = false;
        } else {
            foreach ($row as $item) {
                echo "<td>$item</td>";
            }
        }
        echo "</tr>";

    }


    echo "</table>";
}
?>

<?php
require('../../footer.inc');
?>