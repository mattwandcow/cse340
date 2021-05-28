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
require_once('../model/main-model.php');
?>
<main id="#main-grid">
<fieldset>
<h2>Add a Vehicle</h2>
<fieldset>
<?php
	echo $message;
?>
<form action='index.php' method='post'>
<label>
	Make
	<input type='text' name='log_make' value='' required>
</label>
<label>
	Model
	<input type='text' name='log_model' value='' required>
</label>
<label>
	Description
	<textarea name='log_desc'>
	</textarea>
</label>
<label>
	Image
	<input type='text' name='log_img' value='' required>
</label>
<label>
	Price
	<input type='text' name='log_price' value='' required>
</label>
<label>
	Number in Stock
	<input type='number' min="0" name='log_count' value='' required>
</label>
<label>
	Color
	<input type='text' name='log_color' value='' required>
</label>
<label>
	Car Classification
	<select name='log_carClass'>
<?php
	$carClass_list=getClassifications();
	//var_dump($carClass_list);
	foreach ($carClass_list as $ccl)
	{
		echo "\t<option value=\"".$ccl['cNum']."\">".$ccl['classificationName']."</option>\n";
	}
?>
	</select>
</label>
	<input type='submit' value='Add Vehicle'>
	<input type='hidden' name='action' value='addVehicle'>
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