<?php
/* accounts model */
require_once('../structure/connect.php');

//function handles site registrations
function regClient($fname, $lname, $email, $pass)
{
	$db = createConnection();
	
	$sql = 'INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword) VALUES (:cFname, :cLname, :cEmail, :cPass)';
	
	$stmt = $db->prepare($sql);
	
	$stmt->bindValue(':cFname',$fname, PDO::PARAM_STR);
	$stmt->bindValue(':cLname',$lname, PDO::PARAM_STR);
	$stmt->bindValue(':cEmail',$email, PDO::PARAM_STR);
	$stmt->bindValue(':cPass',$pass, PDO::PARAM_STR);
	
	$stmt->execute();
	
	$rowsChanges = $stmt->rowCount();
	
	$stmt->closeCursor();
	
	return $rowsChanges;
}
?>