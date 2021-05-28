<?php
/* PHP Motors Accounts */

//Cheap folder depth hack
$depth=1;
if ($depth==0)
	$depth_str="";
else
	$depth_str="../";

//includes
require_once('../model/accounts-model.php');

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
		$target_view='../view/500.php';
		break;
	case 'account':
	case 'login':
		$page_title='PHP Motors Login';
		$target_view='../view/login.php';
		break;
	case 'register':
		$page_title='Account Registration';
		$clientFirstname = filter_input(INPUT_POST, 'log_fname');
		$clientLastname = filter_input(INPUT_POST, 'log_lname');
		$clientEmail = filter_input(INPUT_POST, 'log_email');
		$clientPassword = filter_input(INPUT_POST, 'log_pass');
		if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword))
		{
			$message = '<p>Please provide information for all empty form fields.</p>';
			include '../view/registration.php';
			exit; 
		}
		$regOutcome = regClient($clientFirstname,$clientLastname,$clientEmail,$clientPassword);
		if($regOutcome)
		{
			$message="<p>Account Registered. Please Log in.</p>";
			$target_view='../view/login.php';
		}
		else
			$message="<p>Registration Failed. Please try again.</p>";
		break;
	case 'registration':
		$page_title='Account Registration';
		$target_view='../view/registration.php';
		break;

	default:
		$page_title='Accounts Page';
		$target_view='../view/pm_home.php';
		break;
}
include($target_view);
?>
