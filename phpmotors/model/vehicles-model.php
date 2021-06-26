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

// Get vehicle information by invId
function getInvItemInfo($invId)
{
	$db = createConnection();
	$sql = 'SELECT * FROM inventory WHERE invId = :invId';
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
	$stmt->execute();
	$invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $invInfo;
}

function updateInvItemInfo($cID, $cMake, $cModel, $cDesc, $cImg, $cThm, $cPrice, $cStock, $cColor, $cClassID)
{
	$db = createConnection();
	$sql = 'UPDATE inventory SET invMake = :cMake, invModel = :cModel, 
	invDescription = :cDesc, invImage = :cImg, 
	invThumbnail = :cThm, invPrice = :cPrice, 
	invStock = :cStock, invColor = :cColor, 
	classificationId = :cClassID WHERE invId = :cID';
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':cClassID', $cClassID, PDO::PARAM_INT);
	$stmt->bindValue(':cMake', $cMake, PDO::PARAM_STR);
	$stmt->bindValue(':cModel', $cModel, PDO::PARAM_STR);
	$stmt->bindValue(':cDesc', $cDesc, PDO::PARAM_STR);
	$stmt->bindValue(':cImg', $cImg, PDO::PARAM_STR);
	$stmt->bindValue(':cThm', $cThm, PDO::PARAM_STR);
	$stmt->bindValue(':cPrice', $cPrice, PDO::PARAM_STR);
	$stmt->bindValue(':cStock', $cStock, PDO::PARAM_INT);
	$stmt->bindValue(':cColor', $cColor, PDO::PARAM_STR);
	$stmt->bindValue(':cID', $cID, PDO::PARAM_INT);
	$stmt->execute();
	$rowsChanged = $stmt->rowCount();
	$stmt->closeCursor();
	return $rowsChanged;
}
?>