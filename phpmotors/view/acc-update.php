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
<fieldset>
	<h2>Update Information</h2>

	<fieldset><form action='index.php' method='post'>
		<label>
			First Name
			<input type='text' name='log_fname' value='<?php echo $clientFirstname; ?>' required>
		</label>
		<label>
			Last Name
			<input type='text' name='log_lname' value='<?php echo $clientLastname; ?>' required>
		</label>
		<label>
			Email Address
			<input type='email' name='log_email' value='<?php echo $clientEmail; ?>' required>
		</label>
		<input type='submit' value='Update Account'>
		<input type='hidden' name='action' value='update-acc'>
		<input type='hidden' name='accID' value='<?php
		if(isset($_SESSION['clientData']['clientId']))
		{
			echo $_SESSION['clientData']['clientId'];
		}
		elseif(isset($accID))
		{
			echo $accID;
		} 
	?>'>
	</form></fieldset>
	
	<fieldset><form action='index.php' method='post'>
	<h2>Update Password</h2>
	<label>
		New Password:
		<input type='password' name='log_npass' value='' pattern='(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$' required>
		<span>Make sure the password is at least 8 characters and has at least 1 uppercase character, 1 number and 1 special character. </span>
	</label>
		<input type='submit' value='Update Password'>
		<input type='hidden' name='action' value='update-pass'>
		<input type='hidden' name='accID' value='<?php
		if(isset($_SESSION['clientData']['clientId']))
		{
			echo $_SESSION['clientData']['clientId'];
		}
		elseif(isset($accID))
		{
			echo $accID;
		} 
	?>'>
	</form></fieldset>

</fieldset>
</main>

<?php
include('../structure/footer.php');

?>
</body>

</html>