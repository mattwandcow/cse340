<?php

function checkEmail($clientEmail)
{
 $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
 return $valEmail;
}

function checkPassword($clientPassword)
{
	$pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
	return preg_match($pattern, $clientPassword);
}

function buildVehiclesDisplay($vehicles){
 $dv = "<ul id=\"inv-display\">\n";
 foreach ($vehicles as $vehicle) {
  $dv .= "<li><a href='?action=details&id=$vehicle[invId]'>";
  $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
  $dv .= '</a><hr>';
  $dv .= "<h2><a href='?action=details&id=$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</a></h2>";
  $dv .= "<span>$".number_format($vehicle[invPrice],2)."</span>";
  $dv .= "</li>\n";
 }
 $dv .= "</ul>\n";
 return $dv;
}

function buildVehicleDetail($vehicle)
{
	$html_str="";
	$html_str.="<h2 id=\"car_mm\">$vehicle[invMake] $vehicle[invModel]</h2>";
	$html_str.="<main id=\"detail-grid\">\n";
	$html_str.=$message;
	$html_str.="<img id=\"car_img\" src='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
	$html_str.="<aside>\n";
	$html_str.="<h3>Details:</h3>";
	$html_str.="<p>Make: <span class=\"rightside\">$vehicle[invMake]</span></p>";
	$html_str.="<p>Model: <span class=\"rightside\">$vehicle[invModel]</span></p>";
	$html_str.="<p>Asking Price: <span class=\"rightside\">$".number_format($vehicle[invPrice],2)."</span></p>";
	$html_str.="<p>Color: <span class=\"rightside\">$vehicle[invColor]</span></p>";
	$html_str.="<p>Number in Stock: <span class=\"rightside\">$vehicle[invStock]</span></p>";
	$html_str.="<p>Description:</p>";
	$html_str.="<p>$vehicle[invDescription]</p>";
	$html_str.="</aside>";
	$html_str.="</main>";
	
	return $html_str;
}

?>