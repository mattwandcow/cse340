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
<h2>New Car Class</h2>
<fieldset>
<?php
	echo $message;
?>
<form action='index.php' method='post'>
<label>
	Car Class
	<input type='text' name='log_cclass' value='' required>
</label>
	<input type='submit' value='Add Car Class'>
	<input type='hidden' name='action' value='newCarClass'>
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