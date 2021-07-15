<?php
if(!($_SESSION['loggedin']))
{
	header("Location: ../");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Update Review | PHP Motors</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
include($depth_str.'structure/header.php');
include($depth_str.'structure/nav.php');
require_once('../model/main-model.php');
?>
<main id="#main-grid">
<fieldset>
<h2>
	<?php
	if(isset($invInfo['invMake']) && isset($invInfo['invModel']))
	{ 
		echo "Modify $invInfo[invMake] $invInfo[invModel]";
	} 
	elseif(isset($invMake) && isset($invModel))
	{ 
		echo "Modify $invMake $invModel"; 
	}
	?>
</h2>
<fieldset>
<?php
	echo $message;
?>
<form action='index.php' method='post'>
<label>
	Screen Name
	<input type='text' value='<?php echo $screenName;?>' readonly>
</label>
<label>
	Review
	<textarea name='revText' required><?php echo $revText; ?></textarea>
</label>
	<input type='submit' value='Update Review'>
	<input type='hidden' name='action' value='updateReview'>
	<input type='hidden' name='revId' value='<?php echo $revId;?>'>
</form>
</fieldset>
</fieldset>
</main>

<?php
include('../structure/footer.php');

?>
</body>

</html>