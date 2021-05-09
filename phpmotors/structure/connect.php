<?php
function createConnection()
{


$server = 'db5001370268.hosting-data.io';
$dbname = 'dbs1161479';
$username = 'dbu187502';
$password = 'Rachael9Redd!';

//$dsn ='mysql:host='.$server.';port='.$port.';dbname='.$dbname;
$dsn ='mysql:host='.$server.';dbname='.$dbname;
$options = array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION);
try{
    $link = new PDO($dsn, $username, $password, $options);
    return $link;
} catch (PDOException $e) {
    header('Location: /webdev/cse340/phpmotors/500.php');
    //echo 'Sorry, the connection failed - '.$e;
    exit;
}
}

function badConnection()
{


$server = 'db5001268.hosting-data.io';
$dbname = 'aaaaa';
$username = 'dbu1802';
$password = 'Rachael9Redd!';

//$dsn ='mysql:host='.$server.';port='.$port.';dbname='.$dbname;
$dsn ='mysql:host='.$server.';dbname='.$dbname;
$options = array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION);
try{
    $link = new PDO($dsn, $username, $password, $options);
    return $link;
} catch (PDOException $e) {
    header('Location:/webdev/cse340/phpmotors/500.php');
    //echo 'Sorry, the connection failed - '.$e;
    exit;
}
}
?>