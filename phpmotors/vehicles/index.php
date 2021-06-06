<?php
/* PHP Motors Accounts */

require_once('../structure/connect.php');
require_once('../structure/functions.php');
require_once('../model/main-model.php');
require_once('../model/vehicles-model.php');

//Cheap folder depth hack
$depth=1;
if ($depth==0)
	$depth_str="";
else
	$depth_str="../";


//Pulls action from POST or GET. Defaults to POST if Both are valid
	$action = filter_input(INPUT_POST,'action');
	if($action == NULL)
	{
	$action = filter_input(INPUT_GET, 'action');
	}
	$page_title='PHP Motors Vehicles page';
	$target_view='';
switch($action)
{
	case '500':
		$page_title='Server Error';
		$target_view='../view/500.php';
		break;
	case 'add_car_class':
		$page_title='Add Car Class';
		$target_view='../view/add-car-class.php';
		break;
	case 'add_vehicle':
		$page_title='Add Vehicle';
		$target_view='../view/add-vehicle.php';
		break;
	case 'addVehicle':
		//var_dump($_POST);
		$sticky=true;
		$carMake  = trim(filter_input(INPUT_POST, 'log_make'));
		$carModel = trim(filter_input(INPUT_POST, 'log_model'));
		$carDesc  = trim(filter_input(INPUT_POST, 'log_desc'));
		$carImage = trim(filter_input(INPUT_POST, 'log_img'));
		$carPrice = trim(filter_input(INPUT_POST, 'log_price'));
		$carStock = trim(filter_input(INPUT_POST, 'log_count'));
		$carColor = trim(filter_input(INPUT_POST, 'log_color'));
		$carClass = trim(filter_input(INPUT_POST, 'log_carClass'));
		if(empty($carMake)||empty($carModel)||empty($carDesc)||empty($carImage)||empty($carPrice)||empty($carStock)||empty($carColor)||empty($carClass))
		{
			$message = '<p>Please provide information for all empty form fields.</p>';
			include '../view/add-vehicle.php';
			exit; 
		}
		$regOutcome = insertVehicleItem($carMake, $carModel, $carDesc, "/phpmotors/images/no-image.jpg", $carPrice, $carStock, $carColor, $carClass);
		if($regOutcome==1)
		{
			$sticky=false;
			$message="<p>New Vehicle Added.</p>";
			include '../view/add-vehicle.php';
			exit();
		}
		else
		{
			$message="<p>Registration Failed. Please try again.</p>";
			include '../view/add-vehicle.php';
			exit();
		}
		break;
	case 'newCarClass':
		$carClass = filter_input(INPUT_POST, 'log_cclass');
		if(empty($carClass))
		{
			$message = '<p>Please provide information for all empty form fields.</p>';
			include '../view/add-car-class.php';
			exit; 
		}
		$regOutcome =insertCarclass($carClass);
		if($regOutcome==1)
		{
			$message="<p>New Car Class Added.</p>";
			header('Location: index.php');
			exit();
		}
		else
		{
			$message="<p>Registration Failed. Please try again.</p>";
		}
		break;

	default:
		$page_title='Vehicles Page';
		$target_view='../view/vehicle-management.php';
		break;
}
include($target_view);
?>
