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

function checkExistingEmail($regEmail)
{
	$db =  createConnection();
	$sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':email', $regEmail, PDO::PARAM_STR);
	$stmt->execute();
	$matchEmail = $stmt->fetch(PDO::FETCH_NUM);
	$stmt->closeCursor();
	if(empty($matchEmail))
		return 0;
	else
		return 1;
}
function getClient($clientEmail)
{
	$db = createConnection();
	$sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :clientEmail';
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
	$stmt->execute();
	$clientData = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $clientData;
}

?>