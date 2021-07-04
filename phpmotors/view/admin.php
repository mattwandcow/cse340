<?php
if(!$_SESSION['loggedin'])
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

?>

<main id="#main-grid">
<?php 
	echo $message;
?>
	<h1>Data for logged in user</h1>
		<p>You are logged in</p>
		<p>First name: <span><?php echo $_SESSION['clientData']['clientFirstname'];?></span></p>
		<p>Last name: <span><?php echo $_SESSION['clientData']['clientLastname'];?></span></p>
		<p>Email: <span><?php echo $_SESSION['clientData']['clientEmail'];?></span></p>
		<p><a href='?action=accUpdate'>Update Account Information</a></p>
				<?php
			if($_SESSION['clientData']['clientLevel']>1)
			{
		?>
		<h2>Admin Pages</h2>
			<p><a href="<?php echo $depth_str;?>vehicles/">Vehicle Inventory Management</a></p>
			<p><a href="<?php echo $depth_str;?>uploads/?action=upload">Vehicle Image Management</a></p>
		<?php
			}
		?>
</main>

<?php
include('../structure/footer.php');

?>
</body>

</html>