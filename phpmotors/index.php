<?php
/* PHP Motor Home */
//includes
	include('structure/connect.php');

//Pulls action from POST or GET. Defaults to POST if Both are valid
	$action = filter_input(INPUT_POST,'action');
	if($action == NULL)
	{
	$action = filter_input(INPUT_GET, 'action');
	}
	$page_title='PHP Motors Home';
	$target_view='';
switch($action)
{
	case '500':
		$page_title='Server Error';
		$target_view='view/500.php';
		break;

	default:
		$page_title='PHP Motors Hime';
		$target_view='view/pm_home.php';
}
	
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title><?php echo $page_title;?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include('structure/header.php');
include('structure/nav.php');

?>
<main id="#main-grid">
<?php
include($target_view);
?>
</main>

<?php
include('structure/footer.php');

?>
</body>

</html>