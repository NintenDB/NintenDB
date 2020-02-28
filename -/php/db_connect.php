<?php
$db_charset = "utf8mb4";
$db_db = "nintendb";

// $host = "localhost";
// $user = "root";
// $pass = "";

$db_host = "mysql.nintendb.xyz";
$db_user = "nintendb";
$db_pass = "Mindustry11";

$db_options = [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES => false
];

$db_dsn = "mysql:host=$db_host;dbname=$db_db;charset=$db_charset";

try {
    $pdo = new \PDO($db_dsn, $db_user, $db_pass, $db_options);
}catch (\PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>