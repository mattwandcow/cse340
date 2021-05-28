<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title><?php echo $page_title;?></title>
    <link rel="stylesheet" href="<?php echo $depth_str;?>css/style.css">
</head>

<body>
<?php
include('../structure/header.php');
include('../structure/nav.php');

?>

<main id="#main-grid">
	<h1>Vehicle Management</h1>
	<ul>
		<li>
			<a href='<?php echo $depth_str;?>vehicles/index.php?action=add_car_class'>Add Car Classification</a>
		</li>
		<li>
			<a href='<?php echo $depth_str;?>vehicles/index.php?action=add_vehicle'>Add Vehicle</a>
		</li>
</ul>
</main>

<?php
include('../structure/footer.php');

?>
</body>

</html>