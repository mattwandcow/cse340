<?php
//includes
	require('../model/main-model.php');
	$class=getClassifications();
?>
<nav>
<ul>
<li><a href='../../phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>
<?php
foreach ($class as $c)
{
	echo "<li";
	if($action==$c['classificationName']) echo " id='nav_active'";
	echo "><a href='../../phpmotors/index.php?action=".urlencode($c['classificationName'])."' title='View our ".$c['classificationName']." page'>".$c['classificationName']."</a></li>\n";
}
?>
</ul>
</nav>