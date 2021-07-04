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
	$sql = "SELECT i.invId as invId, i.invMake as invMake, i.invModel as invModel, i.invPrice as invPrice, i.invStock as invStock, i.invColor as invColor, i.invDescription as invDescription, j.imgPath as invImage FROM inventory i inner join images j on i.invId = j.invId WHERE i.invId = :invId and j.imgName NOT LIKE '%-tn.%' AND j.imgPrimary=1";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
	$stmt->execute();
	$invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $invInfo;
}
function getSecondaryImages($invId)
{
	$db = createConnection();
	$sql = "SELECT imgPath as invImage FROM images WHERE invId = :invId and imgName LIKE '%-tn.%' AND imgPrimary=0";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
	$stmt->execute();
	$invInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
function getVehiclesByClass($class)
{
	$db = createConnection();
	$sql = 'SELECT j.imgPath AS invThumbnail, i.invId as invId, i.invMake as invMake, i.invModel as invModel, i.invPrice as invPrice FROM inventory i INNER JOIN images j ON j.invId=i.invId WHERE classificationId=(SELECT classificationId FROM carclassification where classificationName=:cclass) AND j.imgName like \'%-tn.%\' and j.imgPrimary=1';
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':cclass',$class, PDO::PARAM_STR);
	$stmt->execute();
	$vehicle_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $vehicle_list;
}
function getVehicles()
{
	$db = createConnection();
	$sql = 'SELECT invId, invMake, invModel FROM `inventory`';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$vehicle_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $vehicle_list;
}
?>