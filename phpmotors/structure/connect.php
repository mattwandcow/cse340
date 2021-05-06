<?php
function createConnection()
{
//$server = '0.0.0.0';
//$server = '127.0.01';
//lists connection refused, with or without ports

$server = 'mysql:3306';
$dbname = 'phpmotors';
$username = 'proxyUser';
$password = 'proxPASS';

//$dsn ='mysql:host='.$server.';port='.$port.';dbname='.$dbname;
$dsn ='mysql:host='.$server.';dbname='.$dbname;
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