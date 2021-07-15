<?php
require_once('../structure/connect.php');
/*
	Insert a review
Get reviews for a specific inventory item
Get reviews written by a specific client
Get a specific review
Update a specific review
Delete a specific review
*/
function reviewInsert($rText, $invId, $cId)
{
	$db = createConnection();
	$sql = 'INSERT INTO reviews (reviewText, invId, clientId) VALUES (:rText, :invId, :cId)';
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':rText',$rText, PDO::PARAM_STR);
	$stmt->bindValue(':invId',$invId, PDO::PARAM_STR);
	$stmt->bindValue(':cId',$cId, PDO::PARAM_STR);
	$stmt->execute();
	$rowsChanges = $stmt->rowCount();
	$stmt->closeCursor();
	return $rowsChanges;
}
function printReviewForm($invId,$uId)
{
	$uName = getScreenName($uId);
	$resultStr="";
	$resultStr.="<fieldset>\n";
	$resultStr.="<form action='../reviews/' method='post'>\n";
	$resultStr.="<label>\n";
	$resultStr.="Name <input type='text' value='".$uName."' readonly>\n";
	$resultStr.="</label>\n";
	$resultStr.="<label>\n";
	$resultStr.="Review\n";
	$resultStr.="<textarea name = 'reviewText' required>\n";
	$resultStr.="</textarea>\n";
	$resultStr.="</label>\n";
	$resultStr.="<input type='hidden' name='user' value='$uId'>\n";
	$resultStr.="<input type='hidden' name='vehicle' value='$invId'>\n";
	$resultStr.="<input type='hidden' name='action' value='review-add'>\n";
	$resultStr.="<input type='submit' value='Add Review'>\n";
	$resultStr.="</form>\n";
	$resultStr.="</fieldset>\n";
	return $resultStr;
}
function getScreenName($uId)
{
	$db = createConnection();
	$sql = "SELECT CONCAT(LEFT(clientFirstname,1),clientLastname) as uName FROM `clients` WHERE clientID=:uid";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':uid',$uId, PDO::PARAM_STR);
	$stmt->execute();
	$invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $invInfo['uName'];
}
function getScreenNameByReview($revId)
{
	$db = createConnection();
	$sql = "SELECT CONCAT(LEFT(clients.clientFirstname,1),clients.clientLastname) as uName FROM `clients` inner join `reviews` on reviews.clientId=clients.clientID WHERE reviews.reviewId=:rid";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':rid',$revId, PDO::PARAM_STR);
	$stmt->execute();
	$invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $invInfo['uName'];
}
function getReviewTextById($revId)
{
	$db = createConnection();
	$sql = "SELECT reviewText FROM `reviews` WHERE reviews.reviewId=:rid";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':rid',$revId, PDO::PARAM_STR);
	$stmt->execute();
	$invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $invInfo['reviewText'];
}
function getReviewsByVehicle($invId)
{
	$db = createConnection();
	$sql = 'SELECT * FROM `reviews` WHERE invId=:vId order by reviewDate desc';
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':vId',$invId, PDO::PARAM_STR);
	$stmt->execute();
	$vehicle_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $vehicle_list;
}
function getReviewsByUser($cId)
{
	$db = createConnection();
	$sql = 'SELECT r.reviewText as reviewText, r.clientId as clientId, r.invId as invId, r.reviewDate as reviewDate, r.reviewId as reviewId, i.invMake as invMake, i.invModel as invModel, i.invId as invId FROM reviews r inner join inventory i on r.invId = i.invId WHERE clientId=:cId order by reviewDate desc';
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':cId',$cId, PDO::PARAM_STR);
	$stmt->execute();
	$review_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $review_list;
}
function createReviewsString($invId)
{
	$reviewList=getReviewsByVehicle($invId);
	$resultStr="";
	$resultStr.="<h3>Customer Reviews</h3>\n";
	if(count($reviewList)==0)
	{
		$resultStr.="<p>There are no reviews to display for this vehicle.<p>\n";
		if($_SESSION['loggedin'])
		{
		$resultStr.="<p>Be the first to leave a review!</p>\n";
		$resultStr.=printReviewForm($invId,$_SESSION['clientData']['clientId']);
		}
		else //not logged in, still 0 reviews
		{
			$resultStr.="<p><a href='../?action=login'>Sign in</a> to leave the first review!</p>\n";
		}
	}
	else //we have reviews
	{
		foreach ($reviewList as $review)
		{
			$resultStr.="<div>\n";
			$resultStr.="<p><span>".getScreenName($review['clientId'])."</span> wrote on ".$review['reviewDate']."</p>\n";
			$resultStr.="<p>".$review['reviewText']."</p>\n";
			$resultStr.="</div>";
		}
		if($_SESSION['loggedin'])
		{
			$resultStr.="<p>Leave a review of your own!!</p>\n";
			$resultStr.=printReviewForm($invId,$_SESSION['clientData']['clientId']);
		}
	}
	return $resultStr;
}
function generateReviews($uId)
{
	$reviewList = getReviewsByUser($uId);
	$resultStr="";
	$resultStr.="<h3>Customer Reviews</h3>\n";
	if(count($reviewList)==0)
	{
		$resultStr.="<p>You have no reviews to display.<p>\n";
	}
	else //we have reviews
	{
		foreach ($reviewList as $review)
		{
			$resultStr.="<div>\n";
			$resultStr.="<p>Review of <a href='../vehicles/?action=details&id=".$review['invId']."'>".$review['invMake']." ".$review['invModel']."</a> written on ".$review['reviewDate']."</p>\n";
			$resultStr.="<p>".$review['reviewText']."</p>\n";
			$resultStr.="<p><a href='../reviews/?action=update&rid=".$review['reviewId']."'>Update</a> <a href='../reviews/?action=delete&rid=".$review['reviewId']."'>Delete</a></p>\n";
			$resultStr.="</div>";
		}
	}
	return $resultStr;
}
function updateReview($rID, $rText)
{
	$db = createConnection();
	$sql = 'UPDATE reviews SET reviewText = :rText WHERE reviewId = :rID';
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':rID', $rID, PDO::PARAM_INT);
	$stmt->bindValue(':rText', $rText, PDO::PARAM_STR);
	$stmt->execute();
	$rowsChanged = $stmt->rowCount();
	$stmt->closeCursor();
	return $rowsChanged;
}
function deleteReview($rID) 
	{
		$db = createConnection();
		$sql = 'DELETE FROM reviews WHERE reviewId = :rID';
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':rID', $rID, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->rowCount();
		$stmt->closeCursor();
		return $result;
	}
?>