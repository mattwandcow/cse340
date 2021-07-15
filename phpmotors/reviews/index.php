<?php
/* PHP Motors Reviews Controller */

require_once('../structure/connect.php');
require_once('../model/reviews-model.php');

//Cheap folder depth hack
$depth=1;
if ($depth==0)
	$depth_str="";
else
	$depth_str="../";


//Start Session
session_start();

$message=$_SESSION['message'];
$_SESSION['message']='';

//Pulls action from POST or GET. Defaults to POST if Both are valid
	$action = filter_input(INPUT_POST,'action');
	if($action == NULL)
	{
	$action = filter_input(INPUT_GET, 'action');
	}
	$page_title='PHP Motors Reviews page';
	$target_view='';

switch($action)
{
	case 'review-add':
		$revText = trim(filter_input(INPUT_POST, 'reviewText'));
		$revUser = trim(filter_input(INPUT_POST, 'user'));
		$revInv = trim(filter_input(INPUT_POST, 'vehicle'));
		if(empty($revText) || empty($revInv) || empty($revUser))
		{
			$message = '<p>Please provide information for all empty form fields.</p>';
			$_SESSION['message']=$message;
			header('Location: ../vehicles/?action=details&id='.$revInv);
		}
		$result=reviewInsert($revText,$revInv,$revUser);
		if($result==0)
		{
			$message="<p>Error: Review not entered</p>";
			$_SESSION['message']=$message;
			header('Location: ../vehicles/?action=details&id='.$revInv);
		}
		else
		{
			$message="<p>Error: Review entered succesfully!</p>";
			$_SESSION['message']=$message;
			header('Location: ../vehicles/?action=details&id='.$revInv);
		}
		break;
	case 'delete':
		$revId = trim(filter_input(INPUT_GET, 'rid'));
		$result=deleteReview($revId);
		if ($result==0)
			$message = '<p>Error in deleting Review.</p>';
		else
			$message="<p>Review Deleted!</p>";
		$_SESSION['message']=$message;
		header('Location: ../accounts/?action=admin');
		exit();
	case 'update':
		$revId = trim(filter_input(INPUT_GET, 'rid'));
		$target_view='../view/review-update.php';
		$revText = getReviewTextById($revId);
		$screenName = getScreenNameByReview($revId);
		break;
	case 'updateReview':
		$revText = trim(filter_input(INPUT_POST, 'revText'));
		$revId = trim(filter_input(INPUT_POST, 'revId'));
		if(empty($revText) || empty($revId))
		{
			$message = '<p>Please provide information for all empty form fields.</p>';
			$_SESSION['message']=$message;
			header('Location: ../reviews/?action=update&rid='.$revId);
			exit();
		}
		$result=updateReview($revId, $revText);
		if ($result==0)
		{
			$message = '<p>Error in submitting Update.</p>';
			$_SESSION['message']=$message;
			header('Location: ../reviews/?action=update&rid='.$revId);
			exit();
		}
		$message="<p>Review Updated!</p>";
		header('Location: ../accounts/?action=admin');
		exit();
	default:
		break;
}
include($target_view);
?>
