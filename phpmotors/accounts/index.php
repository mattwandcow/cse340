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
require_once('../structure/functions.php');

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
		$sticky=true;
		$page_title='Account Registration';
		$clientFirstname = trim(filter_input(INPUT_POST, 'log_fname'));
		$clientLastname = trim(filter_input(INPUT_POST, 'log_lname'));
		$clientEmail = trim(filter_input(INPUT_POST, 'log_email'));
		$clientPassword = trim(filter_input(INPUT_POST, 'log_pass'));
		
		$checkEmail = checkEmail($clientEmail);
		$checkPassword = checkPassword($clientPassword);
		if(empty($clientFirstname) || empty($clientLastname) || empty($checkEmail) || empty($checkPassword))
		{
			$message = '<p>Please provide information for all empty form fields.</p>';
			include '../view/registration.php';
			exit; 
		}
		//Hash Password
		$hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
		$regOutcome = regClient($clientFirstname,$clientLastname,$clientEmail,$hashedPassword);
		if($regOutcome)
		{
			$stick=false;
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
	case 'Logon':
		$sticky=true;
		$clientEmail = trim(filter_input(INPUT_POST, 'log_email'));
		$clientPassword = trim(filter_input(INPUT_POST, 'log_pass'));
		$checkEmail = checkEmail($clientEmail);
		$checkPassword = checkPassword($clientPassword);
		if(empty($checkEmail) || empty($checkPassword))
		{
			$message = '<p>Please provide information for all empty form fields.</p>';
			$target_view='../view/login.php';
		}
		//$logOutcome = regClient($clientFirstname,$clientLastname,$clientEmail,$clientPassword);
		// if($logOutcome)
		// {
			// $stick=false;
			// $message="<p>Account Registered. Please Log in.</p>";
			// $target_view='../view/login.php';
		// }
		else
			// $message="<p>Registration Failed. Please try again.</p>";
		{
			$message="<p>Logged In!.</p>";
			$target_view='../view/login.php';
		}
		break;
	default:
		$page_title='Accounts Page';
		$target_view='../view/pm_home.php';
		break;
}
include($target_view);
?>
