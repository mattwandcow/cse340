<?php
require_once('structure/connect.php');
$link=badConnection();
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>PHP Motors Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
include('structure/header.php');
include('structure/nav.php');


?>

<main>
<?php
$sample_car=$link->query("select * from inventory order by invPrice desc limit 1")->fetch();
echo "<p>The most expensive car in the Invetory is the ".$sample_car['invModel']." by ".$sample_car['invMake'].".</p>\n";
?>
<p><a href='db-test2.php'>Click here to test broken DB connection</a></p>
</main>

<?php
include('structure/footer.php');

?>
</body>

</html>