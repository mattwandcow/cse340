<?php
/* PHP Motors Vehicle */

require_once('../structure/connect.php');
require_once('../structure/functions.php');
require_once('../model/main-model.php');
require_once('../model/vehicles-model.php');
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
	case 'getInventoryItems':
		$classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
		// Fetch the vehicles by classificationId from the DB 
		$inventoryArray = getInventoryByClassification($classificationId); 
		// Convert the array to a JSON object and send it back 
		echo json_encode($inventoryArray); 
		break;
	case 'newCarClass':
		$carClass = filter_input(INPUT_POST, 'log_cclass');
		if(empty($carClass))
		{
			$message = '<p>Please provide information for all empty form fields.</p>';
			include('../view/add-car-class.php');
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
		
	case 'mod':
		$invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
		$invInfo = getInvItemInfo($invId);
		if(count($invInfo)<1)
		{
			$message = 'Sorry, no vehicle information could be found.';
		}
		$target_view= '../view/vehicle-update.php';
		break;
	case 'updateVehicle':
		$classificationId = filter_input(INPUT_POST, 'log_carClass', FILTER_SANITIZE_NUMBER_INT);
		$invMake = filter_input(INPUT_POST, 'log_make', FILTER_SANITIZE_STRING);
		$invModel = filter_input(INPUT_POST, 'log_model', FILTER_SANITIZE_STRING);
		$invDescription = filter_input(INPUT_POST, 'log_desc', FILTER_SANITIZE_STRING);
		$invImage = filter_input(INPUT_POST, 'log_img', FILTER_SANITIZE_STRING);
		$invThumbnail = filter_input(INPUT_POST, 'log_thm', FILTER_SANITIZE_STRING);
		$invPrice = filter_input(INPUT_POST, 'log_price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		$invStock = filter_input(INPUT_POST, 'log_count', FILTER_SANITIZE_NUMBER_INT);
		$invColor = filter_input(INPUT_POST, 'log_color', FILTER_SANITIZE_STRING);
		$invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
		
		if (empty($invId)) 
		{
			$message = '<p>Invalid Id Error.</p>';
			$target_view=  '../view/vehicle-update.php';
			exit;
		}
		if (empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)) 
		{
			$message = '<p>Incomplete Details Error.</p>';
			$include=  '../view/vehicle-update.php';
			exit;
		}
		$updateResult = updateInvItemInfo($invId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
		if ($updateResult) {
			$message = "<p>Congratulations, changes successfully updated.</p>";
			include '../view/vehicle-update.php';
			exit;
		} else {
			$message = "<p>Error. The vehicle was not updated.</p>";
			include '../view/vehicle-update.php';
			exit;
		}
		break;
	case 'classification':
		$classificationName = filter_input(INPUT_GET, 'class', FILTER_SANITIZE_STRING);
		$vehicles = getVehiclesByClass($classificationName);
		if(!count($vehicles))
		{
		$message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
		}
		else
		{
		$vehicleDisplay = buildVehiclesDisplay($vehicles);
		}
		$page_title=$classificationName." Vehicles";
		$target_view='../view/vehicle-class.php';
		break;
	case 'details':
		$carID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
		$vehicle = getInvItemInfo($carID);
		$vehicle_details = buildVehicleDetail($vehicle);
		$vehicle_reviews = createReviewsString($carID);
		$page_title="$vehicle[invMake] $vehicle[invModel]";
		$target_view='../view/vehicle-details.php';
		break;
	default:
		$page_title='Vehicles Page';
		$target_view='../view/vehicle-management.php';
		break;
}
include($target_view);
?>
