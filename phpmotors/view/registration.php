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
	<input type='text' name='log_fname' value='' required>
</label>
<label>
	Last Name
	<input type='text' name='log_lname' value='' required>
</label>
<label>
	Email Address
	<input type='text' name='log_email' value='' required>
</label>
<label>
	Password
	<input type='text' name='log_pass' value='' required>
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