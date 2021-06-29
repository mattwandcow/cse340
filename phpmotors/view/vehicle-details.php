<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title><?php echo $page_title;?></title>
    <link rel="stylesheet" href="<?php echo $depth_str;?>css/style.css">
    <link rel="stylesheet" href="<?php echo $depth_str;?>css/class.css">
</head>

<body>
<?php
include('../structure/header.php');
include('../structure/nav.php');

echo $vehicle_details;
?>


<?php
include('../structure/footer.php');

?>
</body>

</html>