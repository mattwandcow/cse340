<?php
if(!($_SESSION['loggedin'] && $_SESSION['clientData']['clientLevel']==3))
{
	header("Location: ../");
	exit();
}
?>
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
$classificationList  = buildClassifiicationList(getClassifications());
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
<?php
if (isset($message)) { 
 echo $message; 
} 
if (isset($classificationList)) { 
 echo '<h2>Vehicles By Classification</h2>'; 
 echo '<p>Choose a classification to see those vehicles</p>'; 
 echo $classificationList; 
}
?>
<noscript>
<p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
</noscript>
<table id="inventoryDisplay"></table>
</main>

<?php
include('../structure/footer.php');

?>
<script src="../js/inventory.js"></script>
</body>

</html>
