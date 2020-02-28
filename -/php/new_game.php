<?php
$pageTitle = "All Games";
require('../../header.inc');
require('db_connect.php');
?>
	<form method="post">
		<label for="name">Name</label> <br>
		<input name="name" type="text"> <br>

		<label for="franchise">Franchise</label> <br>
		<input name="franchise" type="text"> <br>

		<label for="console">Console</label> <br>
		<input name="console" type="text"> <br>

		<label for="genre">Genre</label> <br>
		<input name="genre" type="text"> <br>

		<label for="players">Players</label> <br>
		<input name="players" type="text"> <br>

		<label for="developer">Developer</label> <br>
		<input name="developer" type="text"> <br>

		<label for="publisher">Publisher</label> <br>
		<input name="publisher" type="text"> <br>

		<label for="year">Year</label> <br>
		<input name="year" type="text"> <br>
		
		<input name="submit" type="submit">
	</form>
</body>
</html>


<?php

if(isset($_POST['submit'])) {

    require('db_connect.php');

////

// get input

    if (!isset($_POST['name'])) {
        die("Please fill out a name.<br>\n(The rest can be blank)");
    }

    $name = null;

    if (isset($_POST['name']))
        $name = $_POST['name'];
    else
        die("Please fill out at least the name.<br>\n(The rest can be left blank)");

    $franchise = null;
    if (isset($_POST['franchise'])) $franchise = $_POST['franchise'];
    $console = null;
    if (isset($_POST['console'])) $console = $_POST['console'];
    $genre = null;
    if (isset($_POST['genre'])) $genre = $_POST['genre'];
    $players = null;
    if (isset($_POST['players'])) $players = $_POST['players'];
    $developer = null;
    if (isset($_POST['developer'])) $developer = $_POST['developer'];
    $publisher = null;
    if (isset($_POST['publisher'])) $publisher = $_POST['publisher'];
    $year = null;
    if (isset($_POST['year'])) $year = $_POST['year'];

///

    $stmt = $pdo->prepare(
        'INSERT INTO games (name, franchise, console, genre, players, developer, publisher, year) VALUES (:name, :franchise, :console, :genre, :players, :developer, :publisher, :year);'
    );

    $stmt->execute(
        [
            'name' => $name,
            'franchise' => $franchise,
            'console' => $console,
            'genre' => $genre,
            'players' => $players,
            'developer' => $developer,
            'publisher' => $publisher,
            'year' => $year
        ]
    );

    echo "<h2>Success! Added game: $name</h2>";
}
?>

<?php
require('../../footer.inc');
?>
