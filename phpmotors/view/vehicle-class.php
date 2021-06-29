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

?>

<main id="#main-grid">
	<h1><?php echo $classificationName; ?> vehicles</h1>
	<?php echo $message;?>
		<?php echo $vehicleDisplay;		?>
</main>

<?php
include('../structure/footer.php');

?>
</body>

</html>