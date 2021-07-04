<?php
/* PHP Motors Uploads */

require_once('../structure/connect.php');
require_once('../structure/functions.php');
require_once('../model/main-model.php');
require_once('../model/vehicles-model.php');
require_once('../model/uploads-model.php');

//Cheap folder depth hack
$depth=1;
if ($depth==0)
	$depth_str="";
else
	$depth_str="../";


$image_dir = '../images/vehicles';
// The path is the full path from the server root
$image_dir_path = $_SERVER['DOCUMENT_ROOT'] . '/webdev/cse340/phpmotors/images/vehicles';

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
	$page_title='PHP Motors Upload page';
	$target_view='';
switch($action)
{
	case 'upload':
		$message="Get to upload";
		// Store the incoming vehicle id and primary picture indicator
		$invId = filter_input(INPUT_POST, 'invId', FILTER_VALIDATE_INT);
		$imgPrimary = filter_input(INPUT_POST, 'imgPrimary', FILTER_VALIDATE_INT);
		
		// Store the name of the uploaded image
		$imgName = $_FILES['file1']['name'];
		
		$imageCheck = checkExistingImage($imgName);
		if($imageCheck)
		{
			$message = '<p class="notice">An image by that name already exists.</p>';
		} 
		elseif (empty($invId) || empty($imgName)) 
		{
			$message = '<p class="notice">You must select a vehicle and image file for the vehicle.</p>';
		} 
		else 
		{
			// Upload the image, store the returned path to the file
			$imgPath = uploadFile('file1');
			// Insert the image information to the database, get the result
			$result = storeImages($imgPath, $invId, $imgName, $imgPrimary);
			// Set a message based on the insert result
			if ($result) 
			{
				$message = '<p class="notice">The upload succeeded.</p>';
			}
			else
			{
				$message = '<p class="notice">Sorry, the upload failed.</p>';
			}
		}
		// Store message to session
		$_SESSION['message'] = $message;
		// Redirect to this controller for default action
		header('location: .');
		break;
	case 'delete':
		// Get the image name and id
		$filename = filter_input(INPUT_GET, 'filename', FILTER_SANITIZE_STRING);
		$imgId = filter_input(INPUT_GET, 'imgId', FILTER_VALIDATE_INT);
			  
		// Build the full path to the image to be deleted
		$target = $image_dir_path . '/' . $filename;
			  
		// Check that the file exists in that location
		if (file_exists($target)) 
		{
		 // Deletes the file in the folder
		 $result = unlink($target); 
		}
			  
		// Remove from database only if physical file deleted
		if ($result) 
		{
		 $remove = deleteImage($imgId);
		}
			  
		// Set a message based on the delete result
		if ($remove) 
		{
		 $message = "<p class='notice'>$filename was successfully deleted.</p>";
		}
		else 
		{
		 $message = "<p class='notice'>$filename was NOT deleted.</p>";
		}
			  
		// Store message to session
		$_SESSION['message'] = $message;
			  
		// Redirect to this controller for default action
		header('location: .');
		break;
	default:
		// Call function to return image info from database
		$imageArray = getImages();
			  
		// Build the image information into HTML for display
		if (count($imageArray)) 
		{
		 $imageDisplay = buildImageDisplay($imageArray);
		}
		else 
		{
		 $imageDisplay = '<p class="notice">Sorry, no images could be found.</p>';
		}
			  
		// Get vehicles information from database
		$vehicles = getVehicles();
		// Build a select list of vehicle information for the view
		$prodSelect = buildVehiclesSelect($vehicles);
			  
		include '../view/image-admin.php';
		exit;
	break;
}
include($target_view);
?>
