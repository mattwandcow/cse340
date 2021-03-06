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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
include($depth_str.'structure/header.php');
include($depth_str.'structure/nav.php');

?>
<main id="#main-grid">
<fieldset>
<h2>Sign in</h2>
<fieldset>
<?php
	echo $message;
?>
<form action='index.php' method='post'>
<label>
	First Name
	<input type='text' name='log_fname' value='<?php if($sticky) echo $clientFirstname; ?>' required>
</label>
<label>
	Last Name
	<input type='text' name='log_lname' value='<?php if($sticky) echo $clientFirstname; ?>' required>
</label>
<label>
	Email Address
	<input type='email' name='log_email' value='<?php if($sticky) echo $clientEmail; ?>' required>
</label>
<label>
	Password
	<input type='password' name='log_pass' value='' pattern='(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$' required>
	<span>Make sure the password is at least 8 characters and has at least 1 uppercase character, 1 number and 1 special character. </span>
</label>
	<input type='submit' value='Register Account'>
	<input type='hidden' name='action' value='register'>
</form>
</fieldset>
Already have an account? <a href='?action=login'>Sign in</a>
</fieldset>
</main>

<?php
include('../structure/footer.php');

?>
</body>

</html>