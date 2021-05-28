<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title><?php echo $page_title;?></title>
    <link rel="stylesheet" href="<?php echo $depth_str;?>css/style.css">
</head>
<body>
<?php

include($depth_str.'structure/header.php');
include($depth_str.'structure/nav.php');

?>
<main id="#main-grid">
<p>Welcome to PHP Motors!</p>
<ul>
<li>
	<a href='<?php echo $depth_str;?>accounts'>Accounts page</a>
</li>
<li>
	<a href='<?php echo $depth_str;?>accounts/?action=login'>Login page</a>
</li>
<li>
	<a href='<?php echo $depth_str;?>accounts/?action=register'>Register page</a>
</li>
<li>
	<a href='<?php echo $depth_str;?>vehicles/'>Vehicles page</a>
</li>
</ul>
</main>

<?php
include('structure/footer.php');

?>
</body>

</html>