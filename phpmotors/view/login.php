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
<?php
	echo $message;
?>
<h2>Sign in</h2>
<fieldset>
<form action='' method='post'>
<label>
	Email Address
	<input type='text' name='log_email' value=''>
</label>
<label>
	Password
	<input type='text' name='log_pass' value=''>
</label>
<input type='submit' value='Login'>
</form>
</fieldset>
No account? <a href='?action=registration'>Register one today!</a>
</fieldset>
</main>

<?php
include('../structure/footer.php');

?>
</body>

</html>