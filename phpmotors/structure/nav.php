<?php
//includes
	require_once('connect.php');
	require_once($depth_str.'model/main-model.php');
	$class=getClassifications();
?>
<nav>
<ul>
<li><a href='<?php echo $depth_str;?>index.php' title='View the PHP Motors home page'>Home</a></li>
<?php
foreach ($class as $c)
{
	echo "<li";
	if($action==$c['classificationName']) echo " id='nav_active'";
	echo "><a href='../phpmotors/index.php?action=".urlencode($c['classificationName'])."' title='View our ".$c['classificationName']." page'>".$c['classificationName']."</a></li>\n";
}
?>
</ul>
</nav>