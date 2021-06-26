<?php
/* Main PHP Motors Model */

//getClassifications pulls from DB to get list of car classificcations for building the database
function getClassifications()
{
	$db = createConnection();
	$sql = 'SELECT classificationName, classificationID as cNum FROM carclassification ORDER BY classificationName ASC';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$classifications = $stmt->fetchAll();
	$stmt->closeCursor();
	return $classifications;
}

function buildClassifiicationList($classifications)
{
	//print_r($classifications);
	 $classificationList = '<select name="classificationId" id="classificationList">'; 
	$classificationList .= "<option>Choose a Classification</option>"; 
	foreach ($classifications as $classification)
	{ 
	//line 24 $classification[cNum] is probably what ever they call it, if your name is different on line 8, need to sync
	$classificationList .= "<option value='$classification[cNum]'>$classification[classificationName]</option>"; 
	} 
 $classificationList .= '</select>'; 
 return $classificationList; 
}

// Get vehicles by classificationId 
function getInventoryByClassification($classificationId){ 
 $db = createConnection(); 
 $sql = ' SELECT * FROM inventory WHERE classificationId = :classificationId'; 
 $stmt = $db->prepare($sql); 
 $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT); 
 $stmt->execute(); 
 $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 $stmt->closeCursor(); 
 return $inventory; 
}

?>