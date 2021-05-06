<?php
function createConnection()
{
$server = 'mysql';
$dbname = 'phpmotors';
$username = 'proxyUser';
$password = 'proxPASS';
$port = '3306';

$dsn ='mysql:host='.$server.';port='.$port.';dbname='.$dbname;
$options = array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION);
try{
    $link = new PDO($dsn, $username, $password, $options);
    return $link;
} catch (PDOException $e) {
    // header('Location: /phpmotors/view/500.php');
    echo 'Sorry, the connection failed - '.$e;
    exit;
}
}
?>