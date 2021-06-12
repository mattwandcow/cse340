<?php
/* PHP Motors Accounts */

//Cheap folder depth hack
$depth=1;
if ($depth==0)
	$depth_str="";
else
	$depth_str="../";

//Start Session
session_start();

$message=$_SESSION['message'];
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
	
// looks for cookies
	if(isset($_COOKIE['firstname']))
		$cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
switch($action)
{
	case '500':
		$page_title='Server Error';
		$target_view='../view/500.php';
		break;
	case 'admin':
		//echo 'admin case';
		$page_title='Admin Page';
		$target_view='../view/admin.php';
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
		
		// check for email already in client list
		if(checkExistingEmail($clientEmail))
		{
			$message = '<p>Email already Registered. Why not login instead?</p>';
			include '../view/login.php';
			exit; 			
		}
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
			$message="<p>Thank you for Registering, $clientFirstname. Please Log in.</p>";
			$_SESSION['message']=$message;
			header('Location: ?action=login');
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
			exit;
		}
		
		$clientData = getClient($clientEmail);
		
		if(!password_verify($clientPassword, $clientData['clientPassword']))
		{
			$message = '<p>Please check Username and Password.</p>';
			$target_view='../view/login.php';
			exit;
		}
		
		$_SESSION['loggedin']=True;
		
		//remove hashed psasword from client data array
		array_pop($clientData);
		
		$_SESSION['clientData']=$clientData;
		$target_view='../view/admin.php';
		break;
	case 'logout':
		session_unset();
		session_destroy();
		header("Location: ../");
		break;
	default:
		$page_title='Accounts Page';
		$target_view='../view/pm_home.php';
		break;
}
include($target_view);
?>
