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
    <title>
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
		| PHP Motors</title>
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
	Make
	<input type='text' name='log_make' value='<?php if(isset($invInfo['invMake'])) echo $invInfo['invMake']; elseif(isset($invMake)) echo $invMake;?>' required>
</label>
<label>
	Model
	<input type='text' name='log_model' value='<?php if(isset($invInfo['invModel'])) echo $invInfo['invModel']; elseif(isset($invModel)) echo $invModel; ?>' required>
</label>
<label>
	Description
	<textarea name='log_desc'><?php if(isset($invInfo['invDescription'])) echo $invInfo['invDescription']; elseif(isset($invDescription)) echo $invDescription; ?>
	</textarea>
</label>
<label>
	Image
	<input type='text' name='log_img' value='<?php if(isset($invInfo['invImage'])) echo $invInfo['invImage']; elseif(isset($invImage)) echo $invImage; ?>' required>
</label>
<label>
	Thumbnail
	<input type='text' name='log_thm' value='<?php if(isset($invInfo['invThumbnail'])) echo $invInfo['invThumbnail']; elseif(isset($invThumbnail)) echo $invThumbnail; ?>' required>
</label>
<label>
	Price
	<input type='text' name='log_price' value='<?php if(isset($invInfo['invPrice'])) echo $invInfo['invPrice']; elseif(isset($invPrice)) echo $invPrice; ?>' required>
</label>
<label>
	Number in Stock
	<input type='number' min="0" name='log_count' value='<?php if(isset($invInfo['invStock'])) echo $invInfo['invStock']; elseif(isset($invStock)) echo $invStock; ?>' required>
</label>
<label>
	Color
	<input type='text' name='log_color' value='<?php if(isset($invInfo['invColor'])) echo $invInfo['invColor']; elseif(isset($invColor)) echo $invColor; ?>' required>
</label>
<label>
	Car Classification
	<select name='log_carClass'>
<?php
	$carClass_list=getClassifications();
	//var_dump($carClass_list);
	foreach ($carClass_list as $ccl)
	{
		if(isset($invInfo['classificationId']))
			$cci=$invInfo['classificationId'];
		elseif(isset($classificationId))
			$cci=$classificationId;
		if(isset($cci)&&$ccl['cNum']==$cci)
			echo "\t<option value=\"".$ccl['cNum']."\" selected>".$ccl['classificationName']."</option>\n";
		else
			echo "\t<option value=\"".$ccl['cNum']."\">".$ccl['classificationName']."</option>\n";
	}
?>
	</select>
</label>
	<input type='submit' value='Update Vehicle'>
	<input type='hidden' name='action' value='updateVehicle'>
	<input type='hidden' name='invId' value='
	<?php 
		if(isset($invInfo['invId']))
		{
			echo $invInfo['invId'];
		}
		elseif(isset($invId))
		{
			echo $invId;
		} 
	?>'>
</form>
</fieldset>
</fieldset>
</main>

<?php
include('../structure/footer.php');

?>
</body>

</html>