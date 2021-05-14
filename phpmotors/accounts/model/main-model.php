<?php
/* Main PHP Motors Model */

//getClassifications pulls from DB to get list of car classificcations for building the database
function getClassifications()
{
	$db = createConnection();
	$sql = 'SELECT classificationName FROM carclassification ORDER BY classificationName ASC';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$classifications = $stmt->fetchAll();
	$stmt->closeCursor();
	return $classifications;
}
?>