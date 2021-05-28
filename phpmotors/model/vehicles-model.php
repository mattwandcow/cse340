<?php
/* accounts model */
require_once('../structure/connect.php');

//function handles site registrations

function insertCarclass($newCarClass)
{
	$db = createConnection();
	
	$sql = 'INSERT INTO carclassification (classificationName) VALUES (:cCarClass)';
	
	$stmt = $db->prepare($sql);
	
	$stmt->bindValue(':cCarClass',$newCarClass, PDO::PARAM_STR);
	
	$stmt->execute();
	
	$rowsChanges = $stmt->rowCount();
	
	$stmt->closeCursor();
	
	return $rowsChanges;
}

function insertVehicleItem($cMake, $cModel, $cDesc, $cImg, $cPrice, $cStock, $cColor, $cClassID)
{
	$db = createConnection();
	
	$sql = 'INSERT INTO inventory (invMake, invModel, invDescription, invImage, invPrice, invStock, invColor, classificationID) VALUES (:cMake, :cModel, :cDesc, :cImg, :cPrice, :cStock, :cColor, :cClassID)';
	
	$stmt = $db->prepare($sql);
	
	$stmt->bindValue(':cMake',$cMake, PDO::PARAM_STR);
	$stmt->bindValue(':cModel',$cModel, PDO::PARAM_STR);
	$stmt->bindValue(':cDesc',$cDesc, PDO::PARAM_STR);
	$stmt->bindValue(':cImg',$cImg, PDO::PARAM_STR);
	$stmt->bindValue(':cPrice',$cPrice, PDO::PARAM_STR);
	$stmt->bindValue(':cStock',$cStock, PDO::PARAM_STR);
	$stmt->bindValue(':cColor',$cColor, PDO::PARAM_STR);
	$stmt->bindValue(':cClassID',$cClassID, PDO::PARAM_STR);
	
	$stmt->execute();
	
	$rowsChanges = $stmt->rowCount();
	
	$stmt->closeCursor();
	
	return $rowsChanges;
}
?>